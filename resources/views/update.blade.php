@extends('layout.app')

@section('content')

<div class="container jumbotron mt-5" style="width: 600px">




              {{-- @if (session('success'))
                <div style="width: 20rem; margin: 0 auto"
                    class="text-center p-3 mb-2 bg-success text-white">
                    {{ session('success') }}
                </div>
                @endif --}}

            <div class="text-center">
                <h2>Update your list</h2>
                <form action=" {{route('update', $newlist)}}" method="Post">
                    @csrf

                    <div>
                        <input type="text" name="task"
                        class="form-control border-rounded @error('task') border-danger @enderror"
                        style="width: 500px; height: 45px"
                        value="{{$newlist->task}}"><br><br>
                        <div class="text-danger">
                        @error('task')
                        {{$message}}
                        @enderror
                        </div>
                   </div>

                   <div>
                        <input type="" name="description"
                        class="form-control border-rounded @error('description') border-danger @enderror"
                        style="height: 100px; width: 500px"

                        value="{{$newlist->description}}"><br><br>
                        <div class="text-danger">
                        @error('description')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div>
                        <input type="text" name="due"
                        class="form-control border-rounded @error('due') border-danger @enderror"
                        style="width: 500px; height: 45px"
                        value="{{$newlist->due}}"><br>
                        <div class="text-danger">
                        @error('due')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary rounded-pill border-0 px-4 mx-auto py-1 text-light">Update</button>

                </form>

            </div>

</div>
@endsection
