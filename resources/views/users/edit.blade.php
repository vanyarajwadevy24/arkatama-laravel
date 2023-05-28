@extends('layouts.main')
@section('content')
<div class="container mt-3">
    <form action="{{route('users.update', $user)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>Edit</h2>
                    <div class="form-group mb-2">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama lengkap" name="name" value="{{ $user->name}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ $user->email}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="role">Role</label>
                        <select name="role_id" id="role_id">
                            @foreach ($roles as $role)
                            <option value="{{$role->id }}" {{  ($user->role_id == $role->id) ? 'selected' : '' }}>{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                        @error('role') <span class="text-danger">{{$message}}</span> @enderror
                    </div>


                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{ $user->password}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Konfirmasi Password" name="password_confirmation" value="{{ $user->password}}">
                    </div>

                </div>

                <div class="card-footer mb-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop