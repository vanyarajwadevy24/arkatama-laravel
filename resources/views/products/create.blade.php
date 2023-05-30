@extends('layouts.main')

@section('content')
    <h1>Data Product</h1>

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-2">
        <label for="">Name</label>
        <input type="text" name="nama" class="form-control">
      </div>
      <div class="mb-2">
        <label for="">Description</label>
        <input type="text" name="deskripsi" class="form-control">
      </div>
      <div class="mb-2">
        <label for="">Price</label>
        <input type="number" name="harga" class="form-control">
      </div>
      <div class="mb-2">
        <label for="">Photo</label>
        <input type="file" name="file" class="form-control">
      </div>
      <input type="submit" class="btn btn-primary" value="Save">
    </form>
@endsection