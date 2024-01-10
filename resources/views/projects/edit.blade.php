@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('projects.update', $project)}}" method="POST">
                
            @csrf
        
            @method('PUT')

            <div>
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{$project->name}}">
            </div>
        
            <div>
                <label for="bio" class="form-label">bio</label>
                <input type="text" class="form-control" name="bio" id="bio" placeholder="bio" value="{{$project->bio}}">
            </div>
        
            <div>
                <label for="type_id" class="form-label">type</label>
                <select name="type_id" class="form-control" id="type_id">
                    <option>Seleziona una tipologia</option>
                    @foreach($types as $type)
                      <option @selected( old('type_id', optional($project->type)->id ) == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                  </select>
            </div>

            <div>
                <label for="technology_id" class="form-label">technology</label>
                <select name="technology_id" class="form-control" id="technology_id" >
                    <option>Seleziona le technologie</option>
                    @foreach($technologies as $technology)
                      <option @selected( old('technology_id') == $technology->id ) value="{{ $technology->id }}">{{ $technology->name }}</option>
                    @endforeach
                  </select>
            </div>
        
            <div>
                <label for="admin" class="form-label">admin</label>
                <input type="text" class="form-control" name="admin" id="admin" placeholder="admin" value="{{$project->admin}}">
            </div>

            <div>
                <label for="thumb" class="form-label">thumb</label>
                <input type="text" class="form-control" name="thumb" id="thumb" placeholder="thumb" value="{{$project->thumb}}">
            </div>
        
            <div>
                <input type="submit" value="modifica" class="btn btn-primary my-2">
            </div>

        </form>

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
@endsection


