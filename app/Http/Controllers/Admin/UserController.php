<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\{User, Profile};
use App\Http\Requests\{StoreUserRequest, UpdateUserRequest};

class UserController extends Controller
{
    protected $users;
    /**
     * Create a new controller instance.
     *
     * @param  Repository $users
     * @return void
     */
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Admin";
        $subtitle = "Users";
        $users = DB::table('users')->get();
        return view('admin.users.index', compact('users', 'title', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Admin";
        $subtitle = "Users";
       
        return view('admin.users.create', compact('title', 'subtitle'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $profile = new Profile();
        $user->profile()->save($profile);
        return redirect()->route('admin.users.index')->withSuccess('User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->find($id);
        $title = "Admin";
        $subtitle = "Users";
        return view('admin.users.edit', compact('user', 'title', 'subtitle'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
