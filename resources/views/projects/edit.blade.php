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
                <div class="mt-3">
                    @foreach($technologies as $technology)

                    <div class="form-check">
                        <input type="checkbox" name="technologies[]" class="form-check-input" value="{{$technology->id}}" id="technology-{{$technology->id}}" @checked(in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all())))>
                        <label class="form-check-label" for="technology-{{$technology->id}}">
                            {{$technology->name}}
                        </label>
                    </div>
                        
                    @endforeach
                </div>
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


