<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\RoleUser;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users =User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         
        $roles= Role::all();      
        return view('user.add', compact('roles'));
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
        
        try{
            DB::beginTransaction();
            $user= new User;
            $user->name= $request->name;
            $user->email= $request->email;
            $user->password= Hash::make($request->password);
            $user->save();
            //$users= $user->id;
            
            //$users->roles()->attach($request->roles);
            
            $roles= $request-> roles;
            foreach($roles as $role){
                $roleuser= new RoleUser;
                $roleuser->user_id= $user->id;
                $roleuser->role_id= $role;
                $roleuser->save(); 
            }
            DB::commit();
            return redirect()->route('users.index');
        }
        catch(\Exception $exception){
            DB::rollBack();
        }
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
        
        $roles= Role::all();  
       
        $user = User::findOrfail($id);

        $roleusers = DB::table('role_users')->where('user_id',$id)->pluck('role_id');   
        
        return view('user.edit', compact('roles','user','roleusers'));
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
        
        try{
            DB::beginTransaction();
            $user= User::where('id', $id);        
            $user->update([
                'name'=>$request->name,
                'email'=> $request->email,
            ]);
            $roleusers= RoleUser::where('user_id', $id);
            $roleusers->delete();
            $roles= $request-> roles;
            foreach($roles as $role){
                $roleuser= new RoleUser;
                $roleuser->user_id= $id;
                $roleuser->role_id= $role;
                $roleuser->save(); 
            }
            DB::commit();
            return redirect()->route('users.index');
        }
        catch(\Exception $exception){
            DB::rollBack();
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          try{
            DB::beginTransaction();
            $user= User::where('id', $id);
            $user->delete();
            $roleusers= RoleUser::where('user_id', $id);
            $roleusers->delete();
            DB::commit();
            return redirect()->route('users.index');
        }
        catch(\Exception $exception){
            DB::rollBack();
        }
       
    }
}
