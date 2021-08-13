@extends('layout.app')

@section('content')

<div class="container jumbotron mt-5" style="width: 600px ">


    <div class="text-center mx-auto">
                <h2>Login</h2>


            <div class="rounded">
                @if (session('invalid'))
                <div class="border-rounded bg-danger text-white mx-auto" style="width: 300px">
                    {{session('invalid')}}
                </div><br>
                @endif
                <form action="{{ route('Userlogin') }}" method="Post">
                    @csrf


                   <div>
                        <input type="text" name="email"
                        class="form-control border-rounded @error('email') border-danger @enderror"
                        style="width: 500px; height: 45px"
                        placeholder="Input email"
                        value="{{old('email')}}"><br><br>
                        <div class="text-danger">
                        @error('email')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div>
                        <input type="password" name="password"
                        class="form-control border-rounded @error('password') border-danger @enderror"
                        style="width: 500px; height: 45px"
                        placeholder="Input password"
                        value=""><br>
                        <div class="text-danger">
                        @error('password')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary border-0  p-2 px-4 text-light">Login</button><br><br>
                    Don't have an account? <a href="{{route('Usersignup') }}">Sign up</a> to continue

                </form>

            </div>

        </div>
</div>
@endsection
