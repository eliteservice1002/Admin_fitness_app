<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\FoodValue;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fooditems = FoodItem::latest()->paginate(5);

        return  view('fooditems.index', compact('fooditems'))
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
        $foodcategories = FoodCategory::latest()->get();
        return view('fooditems.create', compact('foodcategories'));
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
            'food_name' => 'required',
            'food_categories_id' => 'required',
            'carbon' => 'required',
            'protein' => 'required',
            'fat' => 'required',
            'portion_in_grams' => 'required',
        ]);

        FoodItem::create($request->all());

        return  redirect()->route('fooditems.index')
                ->with('success','FoodItem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function show(FoodItem $fooditem)
    {
        //
        return view('fooditems.show',compact('fooditem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodItem $fooditem)
    {
        //
        $foodcategories = FoodCategory::latest()->get();
        return view('fooditems.edit',compact('fooditem', 'foodcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodItem $fooditem)
    {
        //
        $request->validate([
            'food_name' => 'required',
            'food_categories_id' => 'required',
            'carbon' => 'required',
            'protein' => 'required',
            'fat' => 'required',
            'portion_in_grams' => 'required',
        ]);

        $fooditem->update($request->all());

        return  redirect()->route('fooditems.index')
                ->with('success','FoodItem updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $fooditem)
    {
        //
        $foodvalues = FoodValue::where('food_items_id', $fooditem->id)->get();

        foreach($foodvalues as $foodvalue) {
            $foodvalue->delete();
        }

        $fooditem->delete();

        return  redirect()->route('fooditems.index')
                ->with('success','FoodItem deleted successfully');
    }
}
