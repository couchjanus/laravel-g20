<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        
        // foreach ($categories as $category) {
        //     echo $category->name;
        // }

        // $result = DB::table('categories')->pluck('id');
        // $result = DB::table('categories')->pluck('id', 'name');
        // $result = DB::table('categories')->select('name', 'description as category_description')->get();
        // $result = DB::table('categories')->distinct()->get();
        
        // $query = DB::table('categories')->select('name');
        // $result = $query->addSelect('votes')->get();
        // dump($result);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('categories')->insert(
            ['name' => $request['name'], 'description' => $request['description'], 'created_at' => Carbon::now('Europe/Kiev')]);
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
        $category = DB::table('categories')->find(3);
        dump($category);
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
        // dd($category);
        return view('admin.categories.edit', compact('category'));
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
            ->update(['name' => $request['name'], 'description' => $request['description'],  'updated_at' => Carbon::now('Europe/Kiev')]);
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
        DB::table('categories')->where('id',$id)->delete();
        return redirect(route('admin.categories.index'));
    }
}
