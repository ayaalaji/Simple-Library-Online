<?php

namespace App\Http\Controllers\Api;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
     public function __construct()
    {
         $this->middleware('manager')->only('store');
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'main_category_id' =>['integer']
        ]);
        $sub_categories=new SubCategory();
        $sub_categories->name=$request->name;
        $sub_categories->main_category_id=$request->main_category_id;
        $sub_categories->save();
        return response()->json($sub_categories,200);
        
    }  
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sub_categories=SubCategory::finnd($id);
        return response()->json($sub_categories,200);
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
