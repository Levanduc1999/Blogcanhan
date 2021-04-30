<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleUser;
use  App\Models\Role;
use Illuminate\Support\Str;

use App\Models\Articel;
use App\Models\Theme;
use App\Models\Picture;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get role 
        
        $user= auth()->user()->id; 
             
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name');
         

        $articles= Articel::paginate(10);             
        $images=Picture::all();                       
        //$images= [];
       
        //foreach($articles as $article){
          //      $articleid=  $article->id;             
            //    $image=Picture::Where('name', $articleid)->pluck('image');
              //  $isEmpty = $image->isEmpty(); 
                //if ($isEmpty==true)
                //{
                  //  next($article);
                //} else{                                    
                  //  $images = $image; 
                //}                       
        //}   
        return view('article.list', compact('articles','images','roles'));   
        
    }
}
