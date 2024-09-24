<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Creditor;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validated = validate($request->all(), [
            'year_month' => ['nullable', 'string',],
        ]);
        // only current month payments
        $query = Payment::query();
        $year = now()->year;
        $month = now()->month;
//        dd($year, $month);

        if ($year_month = $validated['year_month']?? null) {
            $year = explode('-', $year_month)[0];
            $month = explode('-', $year_month)[1];
            $query->whereYear('created_at', $year);
            $query->whereMonth('created_at', $month);
        } else {
//            $query->whereMonth('created_at', new Carbon(now()));
            $query->whereYear('created_at', $year);
            $query->whereMonth('created_at', $month);
        }

//        $query->where('is_daily', true);
        $paymentsMonthlyAll = $query->orderBy('created_at', 'DESC')->get();
        $payments = $paymentsMonthlyAll->where('is_daily', true);
        $paymentPrevious = $paymentsMonthlyAll->where('is_daily', false)->first();
        // preview month payments
//        $query_previous = $query->where('is_daily', false);
//        $paymentPrevious = $query_previous->orderBy('created_at', 'DESC')->first();
//         dd($paymentPrevious);


        $amount_monthly = 0;
        foreach ($payments as $payment) {
            $amount_monthly += $payment->amount_in?? 0;
            $amount_monthly -= $payment->amount_out?? 0;
        }
        $amount_monthly_negative = $amount_monthly < 0;

        if (!$paymentPrevious) {
            $paymentPrevious = $this->createRecordPaymentPrevious($year, $month);
        }
        $amount_previeus = $paymentPrevious->amount_in - $paymentPrevious->amount_out;

        $amount_total = $amount_previeus + $amount_monthly;
        $amount_total_negative = $amount_total < 0;

        // выводим всех кредиторов/ дебиторов
        $loaners = Creditor::query()
            ->selectRaw('user_id')
            ->selectRaw('users.name')
            ->selectRaw('sum(payments.amount_in) as credit')
            ->selectRaw('sum(payments.amount_out) as debt')
            ->join('payments', 'payments.id', '=', 'creditors.payment_id')
            ->join('users','users.id', '=', 'creditors.user_id')
            ->groupBy('creditors.user_id')
            ->orderBy('creditors.user_id')
            ->get();
        $creditors = [];
        $debtors =[];
        foreach ($loaners as $loaner) {
            $loaner->total = $loaner->credit - $loaner->debt;
            if ($loaner->total > 0) {
                $creditors[] = $loaner;
            } elseif ($loaner->total < 0) {
                $debtors[] = $loaner;
            }
        }
//        dd($loaners, $creditors, $debtors);
        return view('user.payments.index', compact([
            'payments', 'amount_monthly', 'amount_total',
            'paymentPrevious', 'amount_monthly_negative',
            'amount_total_negative', 'creditors', 'debtors',
        ]));
//        return 'OK';
    }

    protected function createRecordPaymentPrevious($year, $month)
    {
        // From a date string
        $date = new Carbon($year . '-' . $month . '-01 01:01:01');
//        dd($date);
        $query = Payment::query();
        $query->whereMonth('created_at', $date->previous());

        $paymentPrevious = $query->get();

        $amount_previeus = 0;
        foreach ($paymentPrevious as $payment) {
            $amount_previeus += $payment->amount_in?? 0;
            $amount_previeus -= $payment->amount_out?? 0;
        }
//        dd($paymentPrevious, $amount_previeus, $amount_previeus < 0);

        $payment = new Payment();
        try {
            DB::transaction(function () use ($payment, $amount_previeus, $year, $month) {
                $payment->title = 'previous';
                $payment->description = 'Sum of previous Month: ' . (new Carbon($year . '-' . $month . '-01 01:01:01'))->format('Y-m-d');
                $payment->is_daily = false;
                $payment->creator_id = Auth::user()->id;
                $payment->image = 'images/no-image.jpeg';
                $payment->created_at = new Carbon($year . '-' . $month . '-01 01:01:01');
                $payment->updated_at = new Carbon($year . '-' . $month . '-01 01:01:01');

                if ($amount_previeus < 0) {
                    $payment->amount_out = abs($amount_previeus);
                } elseif ($amount_previeus > 0) {
                    $payment->amount_in = $amount_previeus;
                }

                $payment->save();

                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }
        return $payment;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $creditors = getAllCreditors();
//        dd($creditors);
        return view('user.payments.create', compact(['creditors']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->input('amount_out'));
        $errorNoAmounts = $request->input('amount_out') === NULL && $request->input('amount_in') === NULL;
        $errorTwoAmounts = $request->input('amount_out') !== NULL && $request->input('amount_in') !== NULL;
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'payout-check' => ['nullable', 'string'],
            'amount_out' => ['nullable', 'string', function (string $attribute, mixed $value, \Closure $fail) use ($errorNoAmounts, $errorTwoAmounts) {
                if ($errorNoAmounts || $errorTwoAmounts) {
                    $fail(__('Должно быть заполнено только одно поле - Amount_in OR Amount_out.'));
                }
            }],
            'amount_in' => ['nullable', 'string', function (string $attribute, mixed $value, \Closure $fail) use ($errorNoAmounts, $errorTwoAmounts){
                 if ($errorNoAmounts || $errorTwoAmounts) {
                     $fail(__('Должно быть заполнено только одно поле - Amount_in OR Amount_out.'));
                 }
            }],
            'creditor_check' => ['nullable', 'string'],
            'creditor_id' => ['nullable', 'string', Rule::exists('users', 'id')],
        ]);
        if (!$request->input('creditor_check')) {
            $validated['creditor_id'] = NULL;
        }
        // Сохраняем файл в папку 'uploads' коротая будет создана в пути starage/app/public
        $imagePath = saveImageIn($request, 'payment-images');

        $payment = new Payment();
        $creditor = new Creditor();
        try {
            DB::transaction(function () use ($payment, $validated, $imagePath, $creditor) {
                $payment->title = $validated['title'];
                $payment->description = $validated['description'];
                $payment->is_daily = true;
                $payment->creator_id = Auth::user()->id;
                $payment->image = $imagePath;

                if ($amountOut = $validated['amount_out'] ?? null) {
                    $payment->amount_out = $amountOut;
                }

                if ($amountIn = $validated['amount_in'] ?? null) {
                    $payment->amount_in = $amountIn;
                }

                $payment->save();

                if ($creditorId = $validated['creditor_id'] ?? null) {
                    $creditor->user_id = $creditorId;
                    $creditor->payment_id = $payment->id;
                    $creditor->save();
                }
                Log::info('Payment: ' . $payment->id . 'amount_in: ' . $payment->amount_in . 'amount_out: ' . $payment->amount_out . 'created by user: ' . Auth::user()->name);

                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }
        alert(__("Payment: $payment->id! created"), 'primary');
        return redirect()->route('user.payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $paymentId)
    {
        $payment = Payment::query()->findOrFail($paymentId);
        $creditors = getAllCreditors();

        return view('user.payments.edit', compact(['payment', 'creditors']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $paymentId)
    {
        $errorNoAmounts = $request->input('amount_out') === null && $request->input('amount_in') === null;
        $errorTwoAmounts = $request->input('amount_out') !== NULL && $request->input('amount_in') !== NULL;
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'payout-check' => ['nullable', 'string'],
            'amount_out' => ['nullable', 'string', function (string $attribute, mixed $value, \Closure $fail) use ($errorNoAmounts, $errorTwoAmounts) {
                if ($errorNoAmounts || $errorTwoAmounts) {
                    $fail(__('Должно быть заполнено только одно поле - Amount_in OR Amount_out.'));
                }
            }],
            'amount_in' => ['nullable', 'string', function (string $attribute, mixed $value, \Closure $fail) use ($errorNoAmounts, $errorTwoAmounts){
                if ($errorNoAmounts || $errorTwoAmounts) {
                    $fail(__('Должно быть заполнено только одно поле - Amount_in OR Amount_out.'));
                }
            }],
            'creditor_check' => ['nullable', 'string'],
            'creditor_id' => ['nullable', 'string', Rule::exists('users', 'id')],
        ]);
        if (!$request->input('creditor_check')) {
            $validated['creditor_id'] = NULL;
        }

        // Сохраняем файл в папку 'uploads' коротая будет создана в пути starage/app/public
        $imagePath = saveImageIn($request, 'payment-images');

        $payment = Payment::query()->findOrFail($paymentId);
        $creditor = Creditor::query()->where('payment_id', '=', $paymentId)->first();

        try {
            DB::transaction(function () use ($request, $payment, $validated, $imagePath, $creditor) {
                $payment->title = $validated['title'];
                $payment->description = $validated['description'];
                $payment->updator_id = Auth::user()->id;
                if ($imagePath !== 'images/no-image.jpeg') {
                    checkAndDeleteImage($request, $payment->image);
                    $payment->image = $imagePath;
                }

                if ($amountOut = $validated['amount_out']?? null) {
                    $payment->amount_out = $amountOut;
                    $payment->amount_in = NULL;
                }

                if ($amountIn = $validated['amount_in']?? null) {
                    $payment->amount_in = $amountIn;
                    $payment->amount_out = NULL;
                }
                if ($creditorId = $validated['creditor_id']?? null) {
                    $creditor->user_id = $creditorId;
                    $creditor->update();
                }

                $payment->update();

                Log::info(
                    'Payment: ' . $payment->id . 'amount_in: ' . $payment->amount_in . 'amount_out: ' . $payment->amount_out . 'updated by user: ' . Auth::user(
                    )->name
                );

                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }
        alert(__("Payment: $payment->id Edited"), 'primary');
        return redirect()->route('user.payments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
