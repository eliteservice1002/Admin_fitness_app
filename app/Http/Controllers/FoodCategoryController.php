<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foodcategories = FoodCategory::latest()->paginate(5);

        return  view('foodcategories.index', compact('foodcategories'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('foodcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        FoodCategory::create($request->all());

        return  redirect()->route('foodcategories.index')
                ->with('success','Food Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodCategory  $foodcategory
     * @return \Illuminate\Http\Response
     */
    public function show(FoodCategory $foodcategory)
    {
        //
        return view('foodcategories.show',compact('foodcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodCategory  $foodcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodCategory $foodcategory)
    {
        //
        return view('foodcategories.edit',compact('foodcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodCategory  $foodcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodCategory $foodcategory)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $foodcategory->update($request->all());

        return  redirect()->route('foodcategories.index')
                ->with('success','Food Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodCategory  $foodcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodCategory $foodcategory)
    {
        //
        $fooditems = FoodItem::where('food_categories_id', $foodcategory->id)->get();

        foreach($fooditems as $fooditem) {
            $fooditem->delete();
        }

        $foodcategory->delete();

        return  redirect()->route('foodcategories.index')
                ->with('success','Food Category deleted successfully');
    }
}
