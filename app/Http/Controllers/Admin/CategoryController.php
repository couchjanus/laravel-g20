<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Admin";
        $subtitle = "Categories";
        $categories = Category::paginate();
        return view('admin.categories.index', compact('categories', 'title', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Admin";
        $subtitle = "Add Category";
        return view('admin.categories.create', compact('title', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('categories')->insert([
            'name' => $request['name'], 
            'description' => $request['description'], 
            'created_at' => Carbon::now('Europe/Kiev')
            ]);
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('categories')->find($id);
        $title = "Admin";
        $subtitle = "Categories";
        return view('admin.categories.show', compact('category', 'title', 'subtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->find($id);
        $title = "Admin";
        $subtitle = "Categories";
        return view('admin.categories.edit', compact('category', 'title', 'subtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request['name'], 
                'description' => $request['description'],  
                'updated_at' => Carbon::now('Europe/Kiev')
                ]);
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect(route('admin.categories.index'));
    }
}
