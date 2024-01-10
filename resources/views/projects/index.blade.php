@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row gap-3 grid">
            @foreach ($projects as $project)
            <div class="card">
                <div class="img-container">
                    <img src="{{$project->thumb}}" alt="">
                </div>
                <div>
                    <ul>
                        <li><a href="{{route('projects.show', $project)}}">{{$project->name}}</a></li>
                        <li>
                            {{isset($project->type) ? $project->type->name : '-'}}
                        </li>
                       
                        <li>{{$project->admin}}</li>

                        <span><a href="{{route('projects.edit', $project)}}" class="btn btn-primary my-3">Edit</a></span>
                        <form action="{{route('projects.destroy', $project)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Cancella" class="btn btn-danger">
                        </form>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>    
    </div>
    
@endsection


