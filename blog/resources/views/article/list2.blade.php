@extends('layouts.app')
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img   class="imgslide" src="{{ asset('img/hh.png') }}" alt="First slide">
        <div class="carousel-caption">
              <a  style="color:#F79F81;font-size:20px; padding-right:10px" href="{{ route('baiviettheme.theme1') }}">Chuyện bên lề</a>
           <a style="color:#F79F81;font-size:20px;padding-right:10px" href="{{ route('baiviettheme.theme2') }}">Chuyện code</a>
           <a style="color:#F79F81;font-size:20px;padding-right:10px" href="{{ route('baiviettheme.friend') }}">Bạn và Tôi</a>
      </div>  
    </div>
  </div>
</div>
<div class="container ">
    <h1>Danh sách bài viết</h1>
    @foreach( $articles as $articel)          
    <div class="row" >
        <div class="col-sm-10" >
            <div>
               <h3><a href="{{ route('baiviet.show',['baiviet'=>$articel->id])}}" >{{ $articel -> title }}</a></h3> 
            </div>       
             <div class="box">
                <div class="col-sm-10 ">       
                    {!! \Illuminate\Support\str::limit($articel->content, 300) . '...' !!}
                </div>
                <div class="col-sm-2 ">
                    @foreach ($images as $image)
                        @if($articel->id==$image->name)
                            <img  class="imagetitle" src="{{ asset('public/'. $image->image) }}" >
                        @endif
                    @endforeach 
                </div>  
            </div>         
        </div>  
        <div class="col-sm-2">    
            <a class="btn btn-outline-dark btn-floating m-1 btn btn-success hide_is_user" href="{{ route('baiviet.edit',['baiviet'=>$articel->id])}}" role="button"
                ><i class="	fa fa-edit"></i
            ></a>
            <a class="btn btn-outline-dark btn-floating m-1 btn btn-danger hide_is_user" href="{{ route('baiviet.destroy',['baiviet'=>$articel->id])}}" role="button"
                ><i class="fa fa-remove"></i
            ></a>
        </div>              
    </div>
    @endforeach
</div>
<div class="pagcenter" >
       {{ $articles -> links() }}
</div>
@include('partials.footer')
@foreach(  $roles as $role)
    @if( $role == "user" )
        <script>  
            $('.hide_is_user').hide()   
        </script>
    @endif
@endforeach
@foreach( (array) $roles as $role)
    @if( empty($role))
        <script>  
            $('.hide_is_user').hide()   
            $("#hide_is_post").hide()
        </script>
    @endif
@endforeach
@endsection
<style>
    .box {
        display: flex;

    }
    .imgslide {
            height:300px;
            width:100%;

        }
    .slide {
        padding-bottom:10px;
    }
    .pagcenter {
        
            text-align: center;
            padding: 0px 40% 0px 40%;
            
    }
    .imagetitle{
        float :right;
        height:200px;
        width:100%;
    }
</style>