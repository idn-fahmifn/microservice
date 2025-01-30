<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FoodResource;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryResource::collection(Category::all());
        return response()->json([
            'data' => $data
        ]);
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
        $request->validate([
            'name' => 'string|required',
            'thumbnail' => 'max:10240|required'
        ]);

        Category::create([
            'thumbnail'     => $request->thumbnail,
            'name'     => $request->name,
        ]);

        return new CategoryResource($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Category::findOrFail($id);
        $food = FoodResource::collection(Food::where('category_id', $id)->get()->all());

        return response()->json([
            'data' => $data,
            'food' => $food,
        ]);
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
}
