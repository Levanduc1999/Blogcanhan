@extends('layouts.app')
@section('content')

<div  class="stybv" >    
    @foreach ($images as $image)
        <img  class="imagetitle" src="{{ asset('public/'.
             $image->image) }}" >
    @endforeach
   <span> {!!$articels->content!!}</span>
</div>
<div class="fb-comments" data-href="https://localhost:8000/baiviet{{$articels->id}}" data-width="" data-numposts="8">
</div>
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
    .imagetitle{
        width::30%;
        height:300px; 
       
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .stybv{
        margin: 30px 250px 0px 250px;
    }
    .fb-comments{
        padding: 100px 20%  100px 20%;
    }
</style>


