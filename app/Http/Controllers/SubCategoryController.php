<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
    
class SubCategoryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:sub-category-list|sub-category-create|sub-category-edit|sub-category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:sub-category-create', ['only' => ['create','store']]);
         $this->middleware('permission:sub-category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sub-category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $sub_categories = SubCategory::with('mainCategory')->latest()->paginate(5);
        // dd($sub_categories);
        return view('sub_category.index',compact('sub_categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_categories=MainCategory::all();
        return view('sub_category.create',compact('main_categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCategory::create($request->all());
    
        return redirect()->route('sub-categories.index')
                        ->with('success','Sub Categories created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $sub_category)
    {
        return view('sub_category.show',compact('sub_category'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $sub_category)
    {
        $main_categories=MainCategory::all();
        return view('sub_category.edit',compact('sub_category','main_categories'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        $sub_category->update($request->all());
    
        return redirect()->route('sub-categories.index')
                        ->with('success','Sub Categories updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();
    
        return redirect()->route('sub-categories.index')
                        ->with('success','Sub Category deleted successfully');
    }
}