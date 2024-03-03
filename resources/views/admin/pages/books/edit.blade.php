@extends('layouts.admin')
@section('title', 'Create Products')
@section('content')
<h1 class="page-title">Edit Books</h1>
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}

    <div class="container">
        <div class="row mb-5">
            <div class="row col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Book</h5>
                    </div>
                        <div class="card-body">
                            <form action="{{route('adminpanel.books-edit', $book->id)}}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">

                                    <label for="name">Title</label>
                                    <input type="text" name = "title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$book->title}}">
                                    @error('title')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">

                                    <label for="name">Price</label>
                                    <input type="number" name = "price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{$book->price/100}}">
                                    @error('price')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div><!-- row ends-->
                                <div class="form-group mb-3">

                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="genre_id">Genre</label>
                                            <select name="genre_id" id="genre_id"  class="form-control
                                            @error('genre_id') is-invalid @enderror">
                                            <option value="">-- Select Genre</option>
                                            @foreach ($genres as $genre)
                                            <option value="{{$genre->id}}" {{$book->genre_id == $book->id ? 'selected' : ''}}>{{$genre->name}}</option>
                                            @endforeach
                                            </select>
                                            @error('genre_id')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-contorl"
                                            @error('image') is-invalid @enderror>
                                            @error('image')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                            <img src="{{asset('storage/' .$book->image)}}" width="80px"  height="100">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description"
                                                        cols="30" rows="10"
                                                        class="form-control @error('description') is-invalid
                                                        @enderror placeholder="Describe your book">
                                                    {{$book->description}}
                                                    </textarea>
                                                        @error('description')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                </div><!-- row ends-->
                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-primary"> Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>    
@endsection