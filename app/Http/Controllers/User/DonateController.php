<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    //

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
//        $stats = Donate::query()
//            ->where('amount', '>', 50)
//            ->count(); // количество записей в таблице danates
        // Кодичество донатов с начала текущего месяца
//        $stats = Donate::query()
//            ->where('created_at', '>=', now()->startOfMonth())
//            ->count(); // количество записей в таблице danates

        // Кодичество донатов с начала предидущего месяца до его конца
//        $stats = Donate::query()
//            ->where('created_at', '>=', now()->subMonth()->startOfMonth())
//            ->where('created_at', '<=', now()->subMonth()->endOfMonth())
//            ->count(); // количество записей в таблице danates

//        // Сумма донатов с начала предидущего месяца до его конца
//        $stats = Donate::query()
//            ->where('created_at', '>=', now()->subMonth()->startOfMonth())
//            ->where('created_at', '<=', now()->subMonth()->endOfMonth())
//            ->sum('amount'); // сумма в таблице danates

        // Среднее значение всех донатов

//        $total_count = Donate::query()->count();
//        $total_amount = Donate::query()->sum('amount');
//        $amount_avg = Donate::query()->avg('amount');
//        $amount_min = Donate::query()->min('amount');
//        $amount_max = Donate::query()->max('amount');

        // Делает 5 запросов к БД
//        $stats = [
//            'total_count' => Donate::query()->count(),
//            'total_amount' => Donate::query()->sum('amount'),
//            'amount_avg' => Donate::query()->avg('amount'),
//            'amount_min' => Donate::query()->min('amount'),
//            'amount_max' => Donate::query()->max('amount'),
//        ];
        // Метод first возвращает одну запись - она сейчас одна
//        $stats = Donate::query()
//            ->selectRaw('count(*) as total_count')
//            ->selectRaw('sum(amount) as total_amount')
//            ->selectRaw('avg(amount) as amount_avg')
//            ->selectRaw('min(amount) as amount_min')
//            ->selectRaw('max(amount) as amount_max')
//            ->first();
        // Метод first не подходит - группировка возвращает несколько записей
        $statistics = Donate::query()
            ->selectRaw('currency_id')
            ->selectRaw('currencies.sort')
            ->selectRaw('count(*) as total_count')
            ->selectRaw('sum(amount) as total_amount')
            ->selectRaw('avg(amount) as amount_avg')
            ->selectRaw('min(amount) as amount_min')
            ->selectRaw('max(amount) as amount_max')
            ->join('currencies', 'currencies.id', '=', 'donates.currency_id')
            ->groupBy('currency_id')
            ->orderBy('currencies.sort', 'ASC')
            ->get();

           // dd($statistics->toArray());

        return view('user.donates.index', compact('statistics'));
    }
}
