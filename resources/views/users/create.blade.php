@extends('layouts.main')
@section('content')
<div class="container mt-3">
    <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div style="font-family:Century Schoolbook" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>Create</h2>
                    <div class="form-group mb-2">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="role">Role</label>
                        <select name="role_id" id="role_id">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                        @error('role') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation">
                    </div>

                </div>

                <div class="card-footer mb-2">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop