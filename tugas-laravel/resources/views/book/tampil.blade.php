@extends('layouts.master')
@section('title')
Halaman Tampil Buku
@endsection
@section('content')
<a href="/book/create" class="btn btn-primary btn-sm my-3" >Tambah</a>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Penulis</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($books as $item)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$item->title}}</td>
            <td>{{$item->author}}</td>
            <td>
                <a href="/book/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
                <a href="/book/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>

            </td>
          </tr>
        @empty
        <tr>
            <td>Tidak ada Data Buku</td>
        </tr>
            
        @endforelse
      
      
    </tbody>
  </table>
@endsection