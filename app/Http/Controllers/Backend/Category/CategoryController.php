<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __consturct()
    {
        //
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        return view('backend.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store  = Category::create($request->all());
        if ($store) {
            return redirect()->back()->with('success','Category Create Successful');
        }else{
            return redirect()->back()->with('error','Try agin!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $update = $category->update($request->all());

        if ($update) {
            return redirect()->back()->with('success','Category Update Successful');
        }else{
            return redirect()->back()->with('error','Try agin!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $delete = $category->delete();
        if ($delete) {
            return redirect()->back()->with('success','Category Delete Successful');
        }else{
            return redirect()->back()->with('error','Try agin!');
        }
    }
}
