<?php

namespace App\Http\Controllers;
use App\Models\RoleUser;
use  App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Articel;
use App\Models\Theme;
use App\Models\Picture;
use App\Http\Requests\StoreArticelRequest;

use rand;

class ArticelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //get role 
        $user= auth()->user()->id;       
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name');

        $themes= Theme::all();
        return view('article.create', compact('themes','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticelRequest $request)
    {
        //
        //get role 


        $themes= $request->themes;
        $articles= new Articel;
        foreach($themes as $theme){              
                $articles->title= $request->title;
                $articles->content= $request->content;
                $articles->idtheme= $theme;
                $articles-> SDT= $request->sdt;
                $articles->save();  
        }      
        $pictures= new Picture;
        $pictures->name= $articles->id;
        $file= $request->file('image');
        if( $file){            
            $extenion= $file->getClientOriginalName();
            $filename=time() .'.'.$extenion;
            $file->move('public', $filename);
            $pictures->image= $filename;
            $pictures->save();
        }
        
        return redirect()->route('baiviet.index')->with('mesg','Dang bai thanh cong');

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
        //get role 
        $user= auth()->user()->id;       
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name');
        
        $articels= Articel::find($id);      
        $images= Picture::Where('name', $id)->get();
        
        return view('article.show', compact('articels','images','roles'));
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
        //get role 
        $user= auth()->user()->id;       
        $roleuser= RoleUser::where('user_id', $user)->pluck('role_id');
        $roles= Role::find($roleuser)->pluck('name');

        $themes= Theme::all();   
        $articels= Articel::find($id);
        $idtheme= Articel::where('id',$id)->pluck('idtheme');
        
      
        return view('article.editbv', compact('articels','themes','idtheme','roles'));
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
    

        $themes= $request->themes;
        $articels= Articel::findOrfail($id);
        foreach($themes as $theme){           
                $articels->update([
                    'title'=>$request->title,
                    'content'=> $request->content,
                    'idtheme'=> $theme,
            ]);
        }
       
        $pictures= Picture::Where('name', $id); 
        $pictures->delete();        
        $file= $request->file('image');
        $extenion= $file->getClientOriginalName();
        $filename=rand(0,99).'.'.$extenion;
        $file->move('public', $filename);
        $pictures= new Picture;
        $pictures->name= $id;
        $pictures->image= $filename;   
        $pictures->save();   
        return redirect()->route('baiviet.index'); 
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

        $pictures= Picture::Where('name', $id);
        $pictures->delete();       
        $articels= Articel::findOrfail($id);
        $articels->delete();
        return redirect()->route('baiviet.index');      
    }
}
