@extends('layouts.main')
@section('content')
                    <div style="font-family:Century Schoolbook" class="card mb-4 mt-3">
                            <div class="card-header">
                                <a href="{{ route('users.create') }}" class="btn btn-success">Create</a>
                            </div>
                            @if (session('error'))
                            <div class="text-danger m-2">
                                <p>{{ session('error') }}</p>
                            </div>
                            @endif
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <a href="{{route('users.show', $user)}}" class="btn btn-success btn-xs">
                                                    Detail
                                                </a>
                                                <a href="{{route('users.edit', $user)}}" class="btn btn-warning btn-xs">
                                                    Edit
                                                </a>
                                                <form class='d-inline' action="{{route('users.destroy', $user)}}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                             <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->roles->role_name}}</td>
                                        </tr>
                                        
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
@endsection