@extends('layouts.app')
@section('content')
   <form method="Post" action="{{ route('users.store')}}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name='name'>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" placeholder="Enter Email" name='email'>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control"  placeholder="Password" name='password'>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="re_password" class="form-control"  placeholder="re_Password" name='re_password'>
        </div>
        <select class="form-select" aria-label="Default select example" name="roles[]" multiple="multiple">            
            @foreach($roles as $role)
            <option value="{{ $role-> id }}">{{ $role ->display_name }}</option>
            @endforeach
        </select>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection