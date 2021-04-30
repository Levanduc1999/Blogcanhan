


@extends('layouts.app')
@section('content')
<div class="container">
    <form enctype="multipart/form-data" method="post" action="{{ route('baiviet.store')}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label  >Title</label>
        <input  value="" type="text" class="form-control" name="title" > 
        @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
    
    <div class="themes">
        <p>Themes</p>
        <select class="form-select assignedvalue" value="" aria-label="Default select example" name="themes[]" >                            
                @foreach($themes as $theme)
                    <option value="{{$theme-> id }}">{{ $theme->nametheme }}</option>
                @endforeach
        </select>
        <input type="text" id="vehicle2" name="sdt" value="">
    </div>
    <div class="form-group">
        <label  >Content</label>
        <textarea class="form-control rounded-0 summernote" name="content"  value=""></textarea>
        @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
    
    <input type="file" name="image" required="true">
    <br/>
  
    <button type="submit" class="btn btn-primary">Create</button>
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
        $('#vehicle2').hide() 
        $('select').on('change', function () {
            if($(this).val()!='3'){
                 $('#vehicle2').hide() 
            }            
            else{
                 $('#vehicle2').show() 
            }
 
        });
      $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('.dropdown-toggle').dropdown()
    </script>
</div>

@endsection
