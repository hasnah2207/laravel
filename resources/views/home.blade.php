@extends('layouts.main')

@section('title', 'Home')

@section('content')

    @php($_name=$name ?? "team")
    {{--
    1. if name equal to abu , i want to display . You are banned
    --}}

   @if($_name == "abu")
      <p>You are banned.</p>
   @elseif($_name == "hasnah")
      <p>You are beautiful.</p>
   @else
       <h1>Hello,  {{ $_name }}.</h1>
   @endif
   <button type="button" class="btn btn-danger">Klik Sini</button>
@endsection
