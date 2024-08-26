<?php

namespace App\Http\Controllers\User;

use App\Exports\MenusExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $validated = validate($request->all(), [
            'search' => ['nullable', 'string', 'min:1', 'max:100'],
            'category_id' => ['nullable', 'string'],
            'cuisine_id' => ['nullable', 'string'],
        ]);
        $cuisines = getAllCuisines();
        $categories = getCategoriesMenu();
//        dd($validated);
        array_unshift($categories, "Все категории");
        if (Auth::check()) {
            $query = Menu::query();

            if ($search = $validated['search'] ?? null) {
                $query->where('title', 'like', "%{$search}%");
            }
            if ($category_id = $validated['category_id'] ?? null) {
                    $query->where('category_id', $category_id);
            }
            if ($cuisine_id_presents = $validated['cuisine_id'] ?? null) {
                if ($cuisine_id_presents && $validated['cuisine_id'] !== 'ALL') {
                    $query->where('cuisine_id', $cuisine_id_presents);
                }
            }
//            $query->orderBy('sort', 'ASC');

            $menus = $query->paginate(12);

        } else {
            $menus = collect([]);
        }
        return view('user.menus.index', compact(['menus', 'categories', 'cuisines'])) ;
    }

    public function create()
    {
        $categories = getCategoriesMenu();
        $cuisines = getAllCuisines();

        return view('user.menus.create', compact(['categories', 'cuisines']));
    }

    public function store(Request $request)
    {
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'cuisine_id' => ['required', 'string', 'max:10'],
            'description' => ['required', 'string', 'max:1000'],
            'active' => ['nullable', 'boolean'],
            'category_id' => ['required', 'string', 'max:10'],
            'price' => ['required', 'numeric', 'min:1', 'max:10000'],
        ]);
        // Сохраняем файл в папку 'uploads' коротая будет создана в пути starage/app/public
        $imagePath = saveImageIn($request, 'menu-images');

        $menuItem = Menu::query()->firstOrCreate([
            'title' => $validated['title'],
        ],
        [
            'description' => $validated['description'],
            'image' => $imagePath,
            'active' => $validated['active']?? false,
            'cuisine_id' => $validated['cuisine_id'],
            'category_id' => $validated['category_id'],
            'price' => $validated['price'],

        ]);

        if ($menuItem->title === $validated['title'] && $menuItem->description === $validated['description']) {
            alert(__("DONE: Created new menu-item: $menuItem->title !"), 'primary');
            return redirect()->route('user.menus.index', $menuItem->id);
        } else if ($menuItem->title === $validated['title'] && $menuItem->description !== $validated['description']) {
            alert(__("FALSE: such menu-item has been in DataBase"), 'danger');
            return redirect()->route('user.menus.create');
        } else  {
            alert(__("Что-то пошло не так"), 'danger');
            return redirect()->route('user.menus.index');
        }
    }

    public function show($menu_id)
    {
        $menuItem =  Menu::query()
            ->findOrFail($menu_id, ['id', 'title', 'description', 'active', 'image', 'category_id', 'cuisine_id']);;
        return view('user.menus.show', compact(['menuItem']));
    }


    public function edit(Request $request, $menuItemId)
    {
        $categories = getCategoriesMenu();
        $cuisines = getAllCuisines();
        $menuItem = Menu::query()->find($menuItemId);
        if ($menuItem) {
            return view('user.menus.edit', compact(['menuItem', 'categories', 'cuisines']));
        } else {
            alert(__("FALSE: no such menu-item in DataBase"), 'danger');
            return redirect()->route('user.menus.create');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $menuId)
    {
        $validated = validate($request->all(), [
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'description' => ['required', 'string', 'max:1000'],
            'active' => ['nullable', 'boolean'],
            'cuisine_id' => ['required', 'string', 'max:10'],
            'category_id' => ['required', 'string', 'max:10'],
            'price' => ['required', 'numeric', 'min:1', 'max:10000'],
        ]);

        // Сохраняем файл в папку 'uploads' коротая будет создана в пути starage/app/public
        $imagePath = saveImageIn($request, 'menu-images');

//         dd($validated, $imagePath);
        $menuItem = Menu::query()->findOrFail($menuId);
        $menuItem->title = $validated['title'];
        $menuItem->description = $validated['description'];
        $menuItem->active = $validated['active']?? false;
        $menuItem->cuisine_id = $validated['cuisine_id'];
        $menuItem->category_id = $validated['category_id'];
        $menuItem->price = $validated['price'];
        if ($imagePath !== 'images/no-image.jpeg') {
            $menuItem->image = $imagePath;
            // Удаляем старую картинку
            $correctedMenu = Menu::find($menuId);
            checkAndDeleteImage($correctedMenu->image);
        }

        $menuItem->update();

        alert(__("DONE: Updated menu-item: $menuItem->title !"), 'primary');
        return redirect()->route('user.menus.index', $menuItem->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $menuId)
    {
        $deletedMenu = Menu::find($menuId);
        // При удалении нужно проверить есть фото Блюда в папке starage/app/public + та часть пути которая хранится в БД (menu-image/hhhh.jpeg)
        checkAndDeleteImage($deletedMenu->image);

        $deletedMenu->delete();
        alert(__("DONE: Deleted $deletedMenu->title !"), 'primary');
        return redirect()->route('user.menus.index');
    }

    /**
     * List of menu for Export in XLSX.
     */
    public function list()
    {
        $categories = Category::query()
            ->with('menus')
            ->orderBy('sort')
            ->get();

        return view('user.menus.index-list', compact(['categories']));
    }

    public function export()
    {
        return Excel::download(new MenusExport, 'menus.xlsx');
    }
}
