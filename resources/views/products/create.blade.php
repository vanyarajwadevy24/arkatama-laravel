@extends('layouts.main')
@section('content')
<div class="container mt-3">
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div style="font-family:Century Schoolbook" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2>Create</h2>
                    <div class="form-group mb-2">
                        <label for="nama">Name Product</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="deskripsi">Description</label>
                        <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"></textarea>
                        @error('deskripsi') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="harga">Price</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga">
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="role">Category</label>
                        <select name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="gambar" class="form-label">Choose Photo</label>
                        <input class="form-control @error('gambar') is-invalid @enderror"  type="file" id="gambar" name="gambar"
                        >
                        @error('gambar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
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