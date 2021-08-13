@extends('layout.app')

@section('content')

<div class="container jumbotron mt-5">

    <div class="text-center">
            <h2>TO Do LIST</h2>
        @if (session('success'))
            <div style="width: 20rem; margin: 0 auto"
                class="text-center p-3 mb-2 bg-success text-white">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 form">

                <form action=" {{route('list')}}" method="Post">
                    @csrf

                    <div>
                        <input type="text" name="task"
                        class="form-control @error('task') border-danger @enderror"
                        placeholder="Input Your Task"
                        value="{{old('task')}}"><br><br>
                        <div class="text-danger">
                        @error('task')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div>
                        <input type="" name="description"
                        class="form-control @error('description') border-danger @enderror"
                        style="height: 100px"
                        placeholder="Describe your task"
                        value="{{old('description')}}"><br><br>
                        <div class="text-danger">
                        @error('description')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <div>
                        <input type="text" name="due"
                        class="form-control @error('due') border-danger @enderror"
                        placeholder="Action due by?"
                        value="{{old('due')}}"><br>
                        <div class="text-danger">
                        @error('due')
                        {{$message}}
                        @enderror
                        </div>
                    </div>

                    <button  class="btn btn-primary border-0 p-2 px-4 text-light">Submit</button>

                </form>

            </div>

            <div class="col-md-8 table">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Task</th>
                            <th>Description</th>
                            <th>Due?</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                           @foreach ($newlist as $newlist)
                               <tr>
                                   <td>{{$newlist->id}}</td>
                                   <td>{{$newlist->task}}</td>
                                   <td>{{$newlist->description}}</td>
                                   <td>{{$newlist->due}}</td>
                                   <td><a href="{{route('update', $newlist)}}"><i class="fa fa-eye " aria-hidden="true"></i></a></td>
                                   <td>
                                       <form action="{{route('list.destroy', $newlist)}}" method="post">
                                           @csrf
                                           @method('DELETE')
                                           <button class="border-0"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                       </form>
                                   </td>
                               </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection








