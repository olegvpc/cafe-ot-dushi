<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class MenusExport implements FromView
{
    /**
    * @return \Illuminate\Contracts\View\View
    */

    public function view(): View
    {
        return view('components.menu.list', [
            'categories' => $this->getCategories()
        ]);
    }
    protected function getCategories() {
        $categories = Category::query()
            ->with('menus')
            ->orderBy('sort')
            ->get();

        return $categories;
    }
}
