<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $main_categories=MainCategory::all();

        return response()->json($main_categories,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainCategoryRequest $request)
    {
       
        $main_categories=new MainCategory();
        $main_categories->name=$request->name;
        $main_categories->save();

        return response()->json($main_categories,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(MainCategory $main_categories)
    {
        
        return response()->json($main_categories,200);
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
