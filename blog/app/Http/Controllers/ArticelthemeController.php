<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Articel;
use App\Models\Theme;
use App\Models\Picture;
use App\Models\RoleUser;
use  App\Models\Role;

use App\Http\Requests\StoreArticelRequest;

use Illuminate\Http\Request;

class ArticelthemeController extends Controller
{
    //
    public function indextheme1()
    {                      
         //
        //get role 
        $user= auth()->user()->id;       
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name'); 

        $images=Picture::all();
        $them= Theme::all();
        foreach($them as $the){           
            $theid= $the->id;
            if($theid==1){               
                $articles= Articel::where('idtheme',$theid)->paginate(10); 
                return view('article.list' . $the->id, compact('articles','images','roles'));  
            }
                                    
        }
    }
    public function indextheme2()
    {      
         //
        //get role 
        $user= auth()->user()->id;       
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name');
        
        $images=Picture::all();
        $them= Theme::all();
        foreach($them as $the){           
            $theid= $the->id;
            if($theid==2){
                $articles= Articel::where('idtheme',$theid)->paginate(10); 
                return view('article.list' . $the->id, compact('articles','images','roles'));  
            }                                    
        }
    }
     public function indexfriends()
    {      
         //
        //get role 
        $user= auth()->user()->id;       
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name');       
        $images=Picture::all();
        $them= Theme::all();
        foreach($roles as $role){
            if($role =='admin'){    
                foreach($them as $the){ 
                    $theid= $the->id;
                     if($theid==3){
                        $articlesfriends= Articel::where('idtheme',$theid)->paginate(10); 
                        return view('article.listfriend', compact('articlesfriends','images','roles'));  
                    }        
                }
            }
            elseif($role =='user'){
               
                $sdtuser= auth()->user()->SDT;
                $articlesfriends= Articel::where('SDT', $sdtuser)->paginate(10);
                return view('article.listfriend', compact('articlesfriends','images','roles'));
            }
        }  
        foreach( (array) $roles as $role){
            if( empty($role)){            
                $sdtuser= auth()->user()->SDT;
                $articlesfriends= Articel::where('SDT', $sdtuser)->paginate(10);
                return view('article.listfriend', compact('articlesfriends','images','roles'));
            }
        }    
      
    }
}
