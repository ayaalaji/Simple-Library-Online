<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
    
class MainCategoryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:main-category-list|main-category-create|main-category-edit|main-category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:main-category-create', ['only' => ['create','store']]);
         $this->middleware('permission:main-category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:main-category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_categories = MainCategory::latest()->paginate(5);
        return view('main_category.index',compact('main_categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main_category.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCategoryRequest $request)
    {
        MainCategory::create($request->all());
    
        return redirect()->route('main-categories.index')
                        ->with('success','Main Categories created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\MainCategory  $main_category
     * @return \Illuminate\Http\Response
     */
    public function show(MainCategory $main_category)
    {
        return view('main_category.show',compact('main_category'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MainCategory  $main_category
     * @return \Illuminate\Http\Response
     */
    public function edit(MainCategory $main_category)
    {
        return view('main_category.edit',compact('main_category'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MainCategory  $main_category
     * @return \Illuminate\Http\Response
     */
    public function update(MainCategoryRequest $request, MainCategory $main_category)
    {
        $main_category->update($request->all());
    
        return redirect()->route('main-categories.index')
                        ->with('success','Main Categories updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MainCategory  $main_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainCategory $main_category)
    {
        $main_category->delete();
    
        return redirect()->route('main-categories.index')
                        ->with('success','Main Category deleted successfully');
    }
}