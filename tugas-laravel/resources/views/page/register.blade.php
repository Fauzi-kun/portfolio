@extends('layouts.master')
@section('title')
Halaman Register
@endsection
@section('content')
    <h1>Sign Up Form</h1>
    <form action="/welcome" method="POST">
    @csrf
    <label for="fname">First Name : </label><br>
    <input type="text" name="fname" id="fname"><br><br>
    <label for="lname">Last Name : </label><br>
    <input type="text" name="lname" id="lname"><br><br>
    <label for="gender">Gender : </label><br>
    <input type="radio" name="gender" value="1">Male<br>
    <input type="radio" name="gender" value="2">Female<br>
    <input type="radio" name="gender" value="3">Other <br>
    <label for="nasionality">Nasionality : </label><br>
    <select name="nasionality" id="nasionality">
        <option value="1">indonesian</option>
        <option value="english"></option>
    </select><br><br>
    <label for="language">Language Spoken : </label><br>
    <input type="checkbox" value="1">Bahasa Indonesia <br>
    <input type="checkbox" value="2">English <br>
    <input type="checkbox" value="3">Other <br><br>
    <label for="bio">Bio : </label><br>
    <textarea name="bio" id="bio" cols="30" rows="10"></textarea><br><br>
    <input type="submit" value="Sign Up">
    </form>
@endsection