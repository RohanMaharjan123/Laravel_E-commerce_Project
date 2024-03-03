@extends('layouts.admin')
@section('title', 'Genre')
@section('content')
    {{-- <h1 class="page-title">Genre</h1>  --}}
    <link rel="stylesheet" href="/css/app.css">

    <div class="container">
        <div class="row mb-5">
            <div class="row md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Genre</h5>
                        <div class="card-body">
                            <form action="#" method="post">
                                @csrf
                                <div class="form-group mb-3"></div>
                                <label for="name">Name</label>
                                <input type="text" name = "name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"/>
                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </form>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary"> Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
