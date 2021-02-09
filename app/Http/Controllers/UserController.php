<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Image;
use App\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       //1éeere methode
        //   $this->Middleware('auth');
       //2éme methode
    //   $this->Middleware('auth')->except(['show','index']);
//        $this->authorizeResource(User::class,'user');
            //$this->authorizeResource(User::class, 'user');
}

    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
        return view('user.show',
        [ 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //   $this->authorize($user);
        return view('user.edit',
        [ 'user'=>$user]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateUser $request, user $user)
    {
        if($request->hasFile('avatar')){
            $path_image=$request->file('avatar')->store('user');
            if($user->image){
                 Storage::delete($user->image->path);
                $user->image->path=$path_image;
                 $user->image->save();
                }
                else{
                    /*  $image=new Image(['path'=>$path_image]);
                       $post->image()->save($image);*/
                       $user->image()->save(new Image(['path'=>$path_image]));
        }
        }
        $user->language=$request->language;
        $user->save();
        return redirect()->back()->withStatus('status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
