<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.index');
    }

    public function getRussianMenu()
    {
        // Все блюда русской и интернациональной кухни
        $menus = Menu::query()
            ->where('active', '=', true)
            ->where((function(Builder $query){
                $query->where('cuisine_id', 'RUS')
                    ->orWhere('cuisine_id', 'ALL');
            }))
            ->get();
        $drink = $menus->where('category_id', '=', "DRINK");
        $salads = $menus->where('category_id', '=', "SALAD");
        $mains = $menus->where('category_id', '=', "MAIN");
        $soups = $menus->where('category_id', '=', "SOUP");

        return view('home.show-menu', compact(['drink', 'salads', 'mains', 'soups', 'menus']));
    }
    public function getThaiMenu()
    {
        // Все блюда тайской и интернациональной кухни
        $menus = Menu::query()
            ->where('active', '=', true)
            ->where((function(Builder $query){
                $query->where('cuisine_id', 'THAI')
                    ->orWhere('cuisine_id', 'ALL');
            }))
            ->get();
        $drink = $menus->where('category_id', '=', "DRINK");
        $salads = $menus->where('category_id', '=', "SALAD");
        $mains = $menus->where('category_id', '=', "MAIN");
        $soups = $menus->where('category_id', '=', "SOUP");

        return view('home.show-menu', compact(['drink', 'salads', 'mains', 'soups', 'menus']));
    }

    public function getSpecialMenu()
    {
        // Все блюда спец предложения
        $menus = Menu::query()
            ->where('active', '=', true)
            ->where('category_id', '=','SPECIAL')
            ->get();

        return view('home.special', compact(['menus']));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        //
    }
}
