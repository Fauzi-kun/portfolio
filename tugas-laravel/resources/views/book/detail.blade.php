@extends('layouts.master')
@section('title')
Halaman Detail Buku
@endsection
@section('content')
<h1 class="text-primary">{{$book->title}} ({{$book->release_year}})</h1>
<p>{{$book->summary}}</p>
<span>penulis : {{$book->author}}</span><br>
<a href="/book" class="btn btn-secondary btn-sm">kembali</a>
@endsection