@extends('layouts.main')
@section('content')

                    <div style="font-family:Century Schoolbook" class="card mb-4 mt-3">
                        <div class="card-header">
                            <a href="{{ route('sliders.create') }}" class="btn btn-success">Create</a>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Photo</th>
                                            <th>Caption</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sliders as $key => $slider)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <a href="{{ route('sliders.edit', $slider) }}" class="btn btn-warning btn-xs">
                                                    Edit
                                                </a>
                                                <form class='d-inline' action="{{ route('sliders.destroy', $slider) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                            <td><img src="{{ asset('storage/' . $slider->gambar )}}" alt="" width="400em"></td>
                                            <td>{{ $slider->caption }}</td>
                                            <td>{{ $slider->deskripsi }}</td>
                                        </tr> 
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
@endsection