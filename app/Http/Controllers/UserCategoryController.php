<?php

namespace App\Http\Controllers;

use App\category_type;
use App\user_category;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $user_categories = user_category::where('user_id','=',session('user'))->get();
     $category_types = category_type::all();
        return view('manage_categories',compact('category_types','user_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function validation($request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validation($request);
        $category = new user_category();
        $category->name =$request->input('name');
        $category->user_id = $request->session()->get('user');
        $category->category_type_id =$request->input('select_category');
        $category->save();
        return redirect('/userdshboard/managecategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user_category  $user_category
     * @return \Illuminate\Http\Response
     */
    public function show(user_category $user_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_category  $user_category
     * @return \Illuminate\Http\Response
     */
    public function edit(user_category $user_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_category  $user_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_category $user_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_category  $user_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_category $user_category)
    {
        //
    }
}
