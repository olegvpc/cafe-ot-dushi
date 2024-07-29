<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ТЕСТОВЫЙ МАССИВ С ПОСТАМИ
         $post = (object)[
         	'id'=>123,
         	'title'=>'Lorem ipsum dolor sit amet.',
         	'content'=>'Lorem ipsum <strong>dolor</strong> sit, amet consectetur adipisicing elit. Praesentium, sequi.',
//            'getID'=> protected function()
//            {
//             return $this->id;
//            },
         ];

         $posts = array_fill(0, 10, $post);
         return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $post_id)
    {
        return "Показываем пост {$post_id}";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function like($post)
    {
        return "Лайки на пост - {$post} method POST";
    }
}
