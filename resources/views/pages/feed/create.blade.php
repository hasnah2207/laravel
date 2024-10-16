@extends('layouts.main')

@section('title', 'Feed Edit')

@section('content')


    {{-- <h1>Page Create</h1> --}}

    <div class="container">

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

      <form action="{{ route('feed.store') }}" method="POST">
        @csrf

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"  maxlength="100" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
      </form>

    </div>

@endsection
