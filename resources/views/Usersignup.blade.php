@extends('layout.app')

@section('content')

<div class="container jumbotron mt-5" style="width: 600px">


    <div class="text-center mx-auto">
                <h2>Sign Up</h2>
              @if (session('success'))
                <div style="width: 20rem; margin: 0 auto"
                    class="text-center p-3 mb-2 bg-success text-white">
                    {{ session('success') }}
                </div>
                @endif



                <form action=" {{route('Usersignup')}}" method="Post">
                    @csrf

                    <div>
                        <input type="text" name="name"
                        class="form-control w-full @error('name') border-danger @enderror"
                        placeholder="Input Name"
                        value="{{old('name')}}"><br><br>
                        <div class="text-danger">
                        @error('name')
                        {{$message}}
                        @enderror
                        </div>
                   </div>

                   <div>
                        <input type="text" name="email"
                        class="form-control w-full @error('email') border-danger @enderror"
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
                        class="form-control w-full @error('password') border-danger @enderror"
                        placeholder="Input password"
                        value=""><br><br>
                        <div class="text-danger">
                        @error('password')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div>
                        <input type="password" name="password_confirmation"
                        class="form-control w-full"
                        placeholder="confirm password"
                        value=""><br>
                    </div>

                    <button class="btn btn-primary border-0  p-2 px-4 text-light">Sign In</button>

                </form><br>

                Already have an account? <a href="{{route('Userlogin')}}">Login</a>
            </div>


                {{-- <a href="{{route('signupupdate', $signup)}}" class="">Update Your Details</a> --}}
                {{-- <form action="{{route('signup.destroy', $signup)}}" method="Post">
                @csrf
                @method('DELETE')
                <button class="border-0">Unsubscribe</button>
                </form> --}}

    </div>
@endsection
