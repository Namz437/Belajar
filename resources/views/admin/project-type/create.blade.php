@extends('admin.admin-layout')

@section('content')
<h2>Create Project Type</h2>

<form method="post" action="{{ route('admin.project-types.store') }}">
    @csrf
  <div class="mb-3">
    <label for="type" class="form-label">Type Name</label>
    <input type="text" class="form-control" id="type" name="type">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <textarea name="description" id="description" row="5" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{ route('admin.project-types.index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection