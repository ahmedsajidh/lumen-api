<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(Request $request){
        $request['api_token'] = str::random(60);
        $request['password'] = app('hash')->make($request['password']);
        $user = User::create($request->all());
        return response()->json($user);
    }
    public function edit(Request $request,$id){
        $user = User::find($id);
        $user->uptade($request->all());
        return response()->json($user);

    }
    public function view($id){
        $post = Post::find($id);
        return response()->json($post);
    }
    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return response()->json('Removed Successfully');
    }
    public function index(){
        $post = Post::all();
        return response()->json($post);
    }
}