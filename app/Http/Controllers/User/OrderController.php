<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // столы со всеми заказами
//        $tables = Table::query()->orderBy('order', 'ASC')->with('orders')->get();
        $tables = Table::query()
            ->leftJoin('orders', 'orders.id', '=', 'tables.order_id')
            ->orderBy('tables.sort')
            ->get(['tables.id', 'tables.is_free', 'tables.order_id', 'orders.menus', 'orders.updated_at', 'orders.accepted', 'orders.accepted_at', 'orders.done']);
          // dd($tables);
        foreach ($tables as $table) {
            $menus = json_decode($table->menus, true);
//              dd($menus);
            //  array:3 [▼ // app/Http/Controllers/User/OrderController.php:20
//                    //  0 => "1001"
//                    //  1 => "1003"
//                    //  2 => "1006"
//                    //]
            if ($menus) {
                $menusInTable = [];
                foreach ($menus as $dish) {
                    $menusInTable[] = Menu::query()
                        ->findOrFail($dish, ['id', 'title', 'price']);
                }
                // Проверяем не старый ли заказ
                $updatedOrderDate = new Carbon($table->updated_at);
                $table->updated_at_carbon = $updatedOrderDate;
                 // dd($updatedDate->format('Y-m-d'), Carbon::today()->format('Y-m-d'));
                 if ($updatedOrderDate->format('Y-m-d') < Carbon::today()->format('Y-m-d')) {
//                     dd("Hello");
                     $table->timeOff = true;
                 } else {
                     $table->timeOff = false;
                 }

                $table->menus = json_encode($menusInTable);
                $totalAmount = 0;
                foreach ($menusInTable as $item) {
                    $totalAmount += $item['price'];
                }
                $table->totalAmount = $totalAmount;
            }
        }
        return view('user.orders.index', compact(['tables']));
        //return 'Show';

    }

    /**
     * Show the form for creating a new resource.
     */
    public function createOrder(Request $request, $tableId)
    {
//        $tableId = $request->input('table_id');
        $validated = $request->validate([
            'category' => ['nullable', 'string', Rule::exists('categories', 'id')],
        ]);
//          dd($validated);

        $table = Table::query()->findOrFail($tableId);
    // Если у стола уже прописан заказ, то берем его, если нету заказа, то создаем новый
        if ($table->order_id) {
            $order = Order::query()->findOrFail($table->order_id);
        } else {
            $order = new Order();
        }

        try {
            DB::transaction(function () use ($table, $order, $tableId) {
                $order->table_id = $tableId;
                $order->save();


                $table->is_free = false;
                $table->order_id = $order->id;
                $table->save();

                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }
        // Если есть фильтрация, то фильтруем из базы
        $query = Menu::query();
        if ($category = $validated['category'] ?? null) {
            $query->where('category_id', $category);
        }
        $menus = $query->paginate(10);

        $orderMenusJson = $order->menus;
        $orderMenus = json_decode($orderMenusJson);
//        dd($order, $orderMenus);
        $selectedMenus = [];
        if ($orderMenus) {
            foreach ($orderMenus as $dish) {
                $selectedMenus[] = Menu::query()
                    ->findOrFail($dish, ['id', 'title', 'price']);
            }
        }
//        dd($selectedMenus);
        $categories = array_keys(getCategoriesMenu());

        alert(__("Created order on a table: $tableId!"), 'primary');
        return view('user.orders.create', compact(['order', 'menus', 'selectedMenus', 'categories']));
    }

    public function add(Request $request, string $menuId)
    {
        $validated = $request->validate([
            'menu-id' => ['required', 'string', Rule::exists('menus', 'id')],
            'order-id' => ['required', 'string', Rule::exists('orders', 'id')]
        ]);
        // dd($menuId, $request->input('menu-id'), $validated);
        $order = Order::query()->findOrFail($validated['order-id']);
        // dd($order);
        $orderMenusJson = $order->menus;
        $orderMenus = json_decode($orderMenusJson);
         // dd($orderMenus, $validated['menu-id']);
        $orderMenus[] = $validated['menu-id'];
        // dd($orderMenus);
        $order->menus = json_encode($orderMenus);
        $order->save();

        return redirect()->route('user.orders.create', $order->table_id);
        //return 'Сохранение одного блюда order->menus';
    }

    /**
     * Удаление пункта меню из списка заказа (order)
     */
    public function destroy(Request $request, string $menuId)
    {
        // dd($menuId);
        $validated = $request->validate([
            'menu-id' => ['required', 'string', Rule::exists('menus', 'id')],
            'order-id' => ['required', 'string', Rule::exists('orders', 'id')]
        ]);
        // dd($menuId, $request->input('menu-id'), $validated);
        $order = Order::query()->findOrFail($validated['order-id']);
        // dd($order);
        $orderMenusJson = $order->menus;
        $orderMenus = json_decode($orderMenusJson);
        // dd($orderMenus, $validated['menu-id'], in_array($validated['menu-id'], $orderMenus));
        if (in_array($validated['menu-id'], $orderMenus)) {
            foreach ($orderMenus as $key=>$value) {
                if ($validated['menu-id'] === $value) {
                    unset($orderMenus[$key]);
                    break;
                }
            }
        }
        // для нормального кодирования в json нужно переаписать индексы в массиве
        $orderMenusArray = [];
        foreach ($orderMenus as $key=>$value) {
            $orderMenusArray[] = $value;
        }

         // dd($orderMenusArray, json_encode($orderMenusArray), $orderMenus, json_encode(array($orderMenus)), array_values($orderMenus), json_encode(array("1005", "1008")) );
        $order->menus = json_encode($orderMenusArray);
        $order->save();

//        dd($orderMenus);
        return redirect()->route('user.orders.create', $order->table_id);
//        return 'Delete menu_id';
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $tableId)
    {
        $table = Table::query()
        ->findOrFail($tableId);

        $order = Order::query()
            ->findOrFail($table->order_id);
        if ($order->table_id !== $tableId) {
            alert(__("NO such table: $tableId!"), 'danger');
        }
        // Считаем общую сумму по Заказу
        $menus = json_decode($order->menus, true);
        if ($menus) {
            $menusInOrder = [];
            foreach ($menus as $dish) {
                $menusInOrder[] = Menu::query()
                    ->findOrFail($dish, ['price']);
            }
            $totalAmount = 0;
            foreach ($menusInOrder as $item) {
                $totalAmount += $item['price'];
            }
        } else {
            $totalAmount = 0;
        }


        // dd($tableId, $table, $order, $totalAmount);
        try {
            DB::transaction(function () use ($table, $order, $totalAmount) {
                $table->is_free = 1;
                $table->order_id = null;
                $table->save();

                $order->total_amount = $totalAmount;
                $order->done = true;
                $order->done_at = new Carbon(now());
                $order->comment = 'Order done';
                $order->save();

                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }

        alert(__("Has DONE order on a table: $tableId!"), 'primary');
        return redirect()->route('user.orders.index');

    }

    /**
     * Вызов страницы с формой для комментария при прекращении заказа.
     */
    public function cancel(Request $request, string $tableId)
    {
        $table = Table::query()->findOrFail($tableId);
        $order = Order::query()->findOrFail($table->order_id);
        if (!$table || !$order || $order->table_id !== $tableId) {
            alert(__("Table $tableId or Order doesn EXIST"), 'danger');
            return redirect()->route('user.orders.index');
        }

        // dd($tableId, $table, $order);
        return view('user.orders.cancel', compact(['tableId', 'order']));
        // return 'Страница с формой комментария';
    }

    /**
     * Вызов страницы с показом Заказа.
     */
    public function show(Request $request, string $orderId)
    {
//        dd($orderId);

        $order = Order::query()->findOrFail($orderId);
        $menusArray = json_decode($order->menus, true);
        $menus = [];
        $order_amount = 0;
        foreach ($menusArray as $item) {
            $menuItem = Menu::query()->findOrFail($item);
            $menus[] = $menuItem;
            $order_amount += $menuItem->price;
        }
        // dd($tableId, $table, $order);
        return view('user.orders.show', compact(['menus', 'order', "order_amount"]));
        // return 'Страница с формой комментария';
    }

    public function delete(Request $request, string $orderId)
    {
        $validated = $request->validate([
            'comment' => ['required', 'string', 'min:20'],
        ]);
        $order = Order::query()
            ->findOrFail($orderId);
        $table = Table::query()->findOrFail($order->table_id);

        if (!$order || !$table || $order->table_id !== $table->id) {
            alert(__("NO such table: $table->id!"), 'danger');
        }

        // dd($table, $order, $validated);
        try {
            DB::transaction(function () use ($table, $order, $validated) {
                $table->is_free = 1;
                $table->order_id = null;
                $table->save();

                $order->canceled_at = new Carbon(now());;
                $order->comment = $validated['comment'];
                $order->save();

                DB::commit();
            });
        } catch (\Exception $e) {
            throw $e;
        }

        alert(__("Canceled order on a table: $order->table_id!"), 'primary');
        return redirect()->route('user.orders.index');
    }

    public function report(Request $request)
    {
        $validated = $request->validate([
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after_or_equal:from_date'],
        ]);
        // dd($validated);

//        $query = Order::query();
//        $query->whereDate('published_at', new Carbon('2023-05-08'))
//        if ($search = $validated['search'] ?? null) {
//            $query->where('title', 'like', "%{$search}%");
//        }
//
//        if ($tag = $validated['tag'] ?? null) {
//            $query->whereJsonContains('tags', $tag);
//        }

        // session(['hello'=>'HELLO']);

//
//        $orders = $query->paginate(12);
        $query = Order::query();
        if ($from_date = $validated['from_date'] ?? null) {
            $query->where('created_at', '>=', new Carbon($from_date));
        }

        if ($to_date = $validated['to_date'] ?? null) {
            $query->where('created_at', '<=', new Carbon($to_date));
        }

        if (!$from_date || !$to_date) {
            $query->whereDate('created_at', new Carbon(now()));
        }

        $orders = $query->orderBy('created_at', 'DESC')->get();

//            ->where('created_at', '>=', now()->subMonth()->startOfMonth())
//            ->whereDate('updated_at', new Carbon(now()))
//            ->selectRaw('updated_at' as '')
//            ->selectRaw('currencies.sort')
//            ->selectRaw('count(*) as total_count')
//            ->selectRaw('sum(total_amount) as total_amount')->get();
//            ->selectRaw('avg(amount) as amount_avg')
//            ->selectRaw('min(amount) as amount_min')
//            ->selectRaw('max(amount) as amount_max')
//            ->join('currencies', 'currencies.id', '=', 'donates.currency_id')
//            ->groupBy('currency_id')
//            ->orderBy('currencies.sort', 'ASC')
//            ->get();
        // dd($statistics);
        $amount = $orders->sum('total_amount' );
        // dd($amount);
        return view('user.orders.report', compact(['orders']));
    }


}
