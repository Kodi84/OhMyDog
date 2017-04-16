<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::lists('name','id')->all();
        return view('admin.users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();
        $file = $request -> file('photo_id');
        if($file){
            $name = time(). $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            //once it's created get photo_id
            $input['photo_id'] = $photo->id;
        }
        $input['password']=bcrypt($request->password);
        User::create($input);
        Session::flash('created_user', 'User ' . $request->name . ' has been created !');
        return redirect('admin/users');
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
        //
        $user =  User::findOrFail($id);
        $roles = Role::lists('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $file = $request -> file('photo_id');

        if(trim($request->password) == ""){
            //everything except password
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password']=bcrypt($request->password);
        }
        if($file){
            $name = time(). $file->getClientOriginalName();
            $file->move('images',$name);
            //check if User doesnt have image. then CREATE one
            if($user->photo_id == ""){
                $photo = Photo::create(['file'=>$name]);
            }else {
                //delete file in FOLDER
                    unlink (public_path() . $user->photo->file);

                //if image already existed, then REPLACE it in DB.
                $existedPhotoId = $user->photo_id;
                $photo = Photo::findOrFail($existedPhotoId);
                $photo->update(['file'=>$name]);

            }
            //once it's created get photo_id
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        Session::flash('updated_user', 'User ' . $user->name . ' has been updated !');

        return redirect('admin/users');
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
        $user = User::findOrFail($id);
        if($user->photo_id !== ""){
            unlink(public_path().$user->photo->file);
        }
        $user->delete();
        $user->photo()->delete();
        Session::flash('deleted_user', 'User ' . $user->name . ' has been deleted !');
        return redirect('admin/users');
    }
}
