@extends('admin.admin-layout')

@section('content')
<h2>Create Project</h2>

<form method="post" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $project->title }}">
    @error('title')
    <div class="invalid-feedback">
      {{$message}}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control" id="image" name="image">
    <img src="{{ asset(Storage::url($project->image)) }}" width="100" class="mt-2" onerror="this.src='https://via.placeholder.com/150'">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <textarea name="description" id="description" row="5" class="form-control">{{ $project->description }}</textarea>
  </div>
  <div class="mb-3">
    <label for="type" class="form-label">Project Type</label>
    <select class="form-control" multiple name="project_type[]">
      @foreach ($projectTypes as $projectType)
      <option value="{{ $projectType->id }}" @if( in_array($projectType->id, $project_types_selected)) selected @endif>{{ $projectType->type }}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection