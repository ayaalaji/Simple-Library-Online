<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
     public function __construct()
    {
         $this->middleware('manager')->except('index','show');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'main_category_id' =>['integer']
        ]);
        $query=SubCategory::query();
        if($request->main_category_id)
            $query->where('main_category_id',$request->main_category_id);
        $sub_categories= $query->get();

        return response()->json($sub_categories,200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        $sub_categories=new SubCategory();
        $sub_categories->name=$request->name;
        $sub_categories->main_category_id=$request->main_category_id;
        $sub_categories->save();
        return response()->json($sub_categories,200);
        
    }  
    

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $sub_category)
    {
        return response()->json($sub_category,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        $sub_category->name=$request->name??$sub_category->name;
        $sub_category->main_category_id=$request->main_category_id??$sub_category->main_category_id;

        $sub_category->save();
        return response()->json($sub_category,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();
        return response()->json(['message'=>'you deleted Sub Category '],200);

    }
}
