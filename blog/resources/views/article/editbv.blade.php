

@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ route ('baiviet.update', ['baiviet'=>$articels->id])}}"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label  >Title</label>
    <input  value="{{$articels->title}}" type="text" class="form-control" name="title" > 
  </div>
  <select class="form-select" aria-label="Default select example" name="themes[]" >            
            @foreach($themes as $theme)            
                <option {{ $idtheme ->contains($theme->id) ? 'selected' : "" }} value="{{ $theme-> id }}">{{ $theme ->nametheme }}</option>
            @endforeach
  </select>
  <div class="form-group">
    <label  >Content</label>
    <textarea class="form-control rounded-0 summernote" name="content"  value="">{!! $articels->content !!}</textarea>
  </div>
  <input type="file" name="image"  required="true">
  <br/>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
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


<script>
      $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('.dropdown-toggle').dropdown()    
</script>
</div>
@endsection