@extends('admin.admin-layout')

@section('content')
<h2>Create Project</h2>

<form method="post" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"> 
    @error('title')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <textarea name="description" id="description" row="5" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Project Type</label>
    <select class="form-control" multiple name="project_type[]">
      @foreach ($projectTypes as $projectType)
      <option value="{{ $projectType->id }}">{{ $projectType->type }}</option>
      @endforeach
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection