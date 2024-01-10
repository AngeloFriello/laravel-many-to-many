@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="img-container">
                <img src="{{$project->thumb}}" alt="">
            </div>
            <div>
                <ul>
                    <li><a href="{{route('projects.show', $project)}}">{{$project->name}}</a></li>
                    <li>{{isset($project->type) ? $project->type->name : '-'}}</li>
                    <li>{{$project->bio}}</li>
                    <li>{{$project->admin}}</li>

                    <@foreach ($project->technologies as $technology)
                        <li class="">{{ $technology->name }}</li>
                    @endforeach 

                    <li>Progetto creato il {{$project->created_at}}</li>
                    <li>Ultimo aggiornamento {{$project->updated_at}}</li>
                    <span><a href="{{route('projects.edit', $project)}}" class="btn btn-secondary my-3">Edit</a></span>
                    <form action="{{route('projects.destroy', $project)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Cancella" class="btn btn-danger">
                    </form>
                </ul>
            </div>
        </div>
    </div>

@endsection

