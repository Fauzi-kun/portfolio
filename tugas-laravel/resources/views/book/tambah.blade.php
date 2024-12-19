@extends('layouts.master')
@section('title')
Halaman Tambah Buku
@endsection
@section('content')
<form method="POST" action="/book">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @csrf
    <div class="form-group">
      <label for="title">Judul Buku</label>
      <input type="text" class="form-control" value="{{old('title')}}" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="summary">Summary/label>
        <textarea name="summary" class="form-control" id="summary" cols="30" rows="10">{{old('summary')}}</textarea>
    </div>
    <div class="form-group">
        <label for="author">Penulis</label>
        <input type="text" class="form-control" value="{{old('author')}}" id="author" name="author">
      </div>
      <div class="form-group">
        <label for="release_year">Tahun Rilis</label>
        <input type="text" class="form-control" value="{{old('release_year')}}" id="release_year" name="release_year">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection