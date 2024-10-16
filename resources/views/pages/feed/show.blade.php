@extends('layouts.main')

@section('title', 'Feed Edit')

@section('content')


    {{-- <h1>Feed Edit</h1> --}}

    <div class="container">
      <form action="{{ route('feed.update',['feed'=> $feed->id]) }}" method="POST">
        @csrf
        @method('PUT')
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title',$feed->title) }}"  minlength="3" maxlength="100" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" cols="30" rows="10">{{ old('description',$feed->description) }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">Update Feed</button>
      </form>

    </div>

@endsection
