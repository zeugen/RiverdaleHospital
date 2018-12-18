<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;

class adminUsersController extends Controller
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
        //pull out roles
        $roles = Role::pluck('name','id')->all();
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
        if(trim($request->password )== ''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
          //ecnvrypt password iff the password is there
            $input['password'] = bcrypt($request->password);
        }
        
        //check if theres a file uploaded
        if($file=$request->file('photo_id')){
            //get its name and append the time of upload to it
            $name = time().$file->getClientOriginalName();
            //move it to the public images folder
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        }
      
        //if there is no photo do this
        User::create($input);
        return redirect('/admin/users');
     
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
        //Find user
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view ('admin.users.edit',compact('user','roles'));
        
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
        // Get specific user
        $user= User::findOrFail($id);

        //lets grab the request data and save it in input 
        if(trim($request->password )== ''){
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
          //ecnvrypt password iff the password is there
            $input['password'] = bcrypt($request->password);
        }
        $input = $request->all();
        if($file = $request->file('photo_id')){
             //get its name and append the time of upload to it
             $name = time().$file->getClientOriginalName();
             //move it to the public images folder
             $file->move('images',$name);
             $photo = Photo::create(['file'=>$name]);
             $input['photo_id']= $photo->id;

        }
        $user->update($input);
        return redirect('/admin/users');

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
        $user= User::findOrFail($id);
        //delete user image
        unlink(public_path().$user->photo->file);
        $user->delete();
        Session::flash('deleted_user','The user has been deleted');
        return redirect('/admin/users');
    }
}
