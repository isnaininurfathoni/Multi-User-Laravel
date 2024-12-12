@extends('layout.template')

@section('title','Edit User')
@section('content')
    
<div class="mb-3">
    <a href="{{ url('role-management') }}" class="btn btn-primary">Back</a>
</div>
<form action='{{ url('role-management/'.$data->name) }}' method='post'>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $item)
              <li>{{ $item }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  @csrf
  @method('PUT')
  <div class="my-3 p-3 bg-body rounded shadow-sm">
      <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
              {{ $data->name }}
          </div>
      </div>
      <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
              {{ $data->email }}
          </div>
      </div>
      <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
              {{ $data->password }}
          </div>
      </div>
      <div class="mb-3 row">
          <label for="role" class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-10">
              <select class="form-select" name="role" id="role">
                  <option value="teknisi" {{ $data->role == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                  <option value="administrator" {{ $data->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                  <option value="superuser" {{ $data->role == 'superuser' ? 'selected' : '' }}>Superuser</option>
              </select>
          </div>
      </div>
      <div class="mb-3 row">
          <label for="role" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">UPDATE</button></div>
      </div>
    </form>
@endsection