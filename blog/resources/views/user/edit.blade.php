@extends('layouts.app')
@section('content')
   <form method="Post" action="{{ route('users.update', [ 'user'=>$user->id])}}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name='name' value='{{ $user->name }}'>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" placeholder="Enter Email" name='email'value='{{ $user->email }}'>
        </div>      

        <select class="form-select" aria-label="Default select example" name="roles[]" multiple="multiple">            
            @foreach($roles as $role)            
            <option {{ $roleusers ->contains($role->id) ? 'selected' : "" }} value="{{ $role-> id }}">{{ $role ->display_name }}</option>
            @endforeach
        </select>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
@endsection