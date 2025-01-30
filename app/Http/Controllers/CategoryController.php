<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::withCount('food')->paginate(10);
        return view('category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('thumbnail')) {
            $img = $request->file('thumbnail');
            $path = 'public/images/category';
            $ext = $img->getClientOriginalExtension();
            $name = 'thumbnail_category_'.Carbon::now()->format('dmy_hms') .'.'. $ext;
            $img->storeAs($path, $name);
            $input['thumbnail'] = $name;
        }
        Category::create($input);
        return redirect()->route('category.index')->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Category::findOrFail($id);
        $food = Food::where('category_id', $id)->get()->all();
        return view('category.show', compact('data','food'));
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
    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully');
    }
}
