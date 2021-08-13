@extends('layout.app')

@section('content')

<div class="text-center rounded mx-auto mt-5 p-4 jumbotron" style="width: 700px">


    <h1>WELCOME!</h1><br>
    <h3>This is your to-do-list, Please Log in or Sign up to proceed</h3><br>

    <a href="{{route('Userlogin')}}"><button class="btn bg-primary  border-0 p-2 px-4 text-light">Login</button></a>&nbsp;
    <a href="{{route('Usersignup')}}"><button class="btn bg-primary border-0 px-4 p-2 text-light">Sign Up</button></a>
</div>
@endsection
