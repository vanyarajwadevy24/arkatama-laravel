@extends('layouts.main')
@section('content')
<div class="container mt-3">
    <form action="{{route('products.show', $product)}}" method="post" enctype="multipart/form-data">
        @csrf
    <div style="font-family:Century Schoolbook" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>Detail</h2>
                    <div class="form-group mb-2">
                        <label for="nama">Name products</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"  name="nama" value="{{ $product->nama ?? old('nama') }}" disabled>
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="deskripsi">Description</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi" value="{{ $product->deskripsi ?? old('deskripsi') }}" disabled>
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="harga">Price</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga" name="harga" value="{{ $product->harga ?? old('harga') }}" disabled>
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="role">Category</label>
                        <select name="category_id" id="category_id" disabled>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer mb-2">
                    <a href="{{ route ('products.show', $product) }}" class="btn btn-success btn-xs">
                        Detail
                    </a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-xs">
                        Edit
                    </a>
                    <form class='d-inline' action="{{ route('products.destroy', $product) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop