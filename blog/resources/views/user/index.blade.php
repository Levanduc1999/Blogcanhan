@extends('layouts.app')
@section('content')
    <a class="btn btn-primary" href="{{ route('users.create') }}" role="button">Create</a>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>     
            <th scope="col">action</th>         
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$loop-> index +1}}</th>
            <td>{{ $user-> name }}</td>
            <td>{{ $user-> email}}</td> 
            <td><a class="btn btn-primary" href="{{ route('users.edit', [ 'user'=>$user->id]) }}" >edit</a>
                <a class="btn btn-primary" href="{{ route('users.destroy', [ 'user'=>$user->id]) }}" >dele</a>
            </td>       
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection
