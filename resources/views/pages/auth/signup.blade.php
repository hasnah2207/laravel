@extends('layouts.main')

@section('title', 'sign up')

@section('content')

<div class="container mt-5">
<h1>Page Register</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ( $errors->all() as $error )
         <li>
            {{ $error }}
         </li>

        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('auth.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" >
        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" >
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
