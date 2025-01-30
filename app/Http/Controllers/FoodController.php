<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Food::paginate(10);
        return view('food.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('food.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $path = 'public/images/food';
            $ext = $img->getClientOriginalExtension();
            $name = 'image_category_'.Carbon::now()->format('dmy_hms') .'.'. $ext;
            $img->storeAs($path, $name);
            $input['image'] = $name;
        }
        Food::create($input);
        return redirect()->route('food.index')->with('success', 'Food Created Successfully');
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
