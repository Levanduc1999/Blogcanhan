<?php

namespace App\Http\Middleware;
use App\User;
use App\Models\Role;
use App\Models\RoleUser;
use Hash;
use DB;
use Closure;
use Auth;
class checkadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user= auth()->user()->id;    
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name'); 
        foreach($roles as $role){
        if($role=='admin'){
             return $next($request);
        }
        else{
             return redirect()->route('baiviet.index');
        }
    }
    }
}
