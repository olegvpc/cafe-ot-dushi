<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

if(! function_exists('test')) {
    function test()
    {
//        return app('test');
        return "Hello from helpers";
    }
}

if(! function_exists('active_link')) {
    function active_link(string $name, $active = 'active'): string
    {
        return Route::is($name) ? $active : '' ;
    }
}
if(! function_exists('alert')) {
    function alert(string $text_alert, $alert_status = 'info')
    {
        // dd($text_alert, $alert_status);
        session(['alert' => $text_alert, 'alert_status' => $alert_status]);
    }
}

if(! function_exists('validate')) {
    function validate(array $attributes, array $rules): array {

        return validator($attributes, $rules)->validate();
    }
}

if(! function_exists('__money')) {
    function __money(string $amount, string $currencyId): string {
        $currencyIcon = '';
        switch ($currencyId) {
            case 'USD':
                $currencyIcon = '$';
                break;
            case 'RUB':
                $currencyIcon = 'R';
                break;
            case 'BTC':
                $currencyIcon = 'B';
                break;
            default:
                $currencyIcon = '?';
//                throw ValidationException::withMessages([
//                'currency_error' => __('Не определена валюта'),
//                ]);
        }
        // dd(session('currency_error'));
        $value = number_format($amount, 2, '.', ' ');
        return $value . ' ' . $currencyIcon;
    }
}

if(! function_exists('transaction')) {
    function transaction(\Closure $callback, int $attempts = 1)
    {
        info("Уровень транзакции: " . DB::transactionLevel());
        if (DB::transactionLevel() > 0) {
            return $callback;
        }
        return DB::transaction($callback, $attempts);
    }
}
