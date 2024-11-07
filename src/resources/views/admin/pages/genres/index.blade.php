@extends('layouts.admin')
@section('title', 'Genre')
@section('content')
{{-- {{dd($genres)}} --}}
    <h1 class="page-title">Genre</h1>
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}

    <div class="container">
        <div class="row mb-5">
            <div class="row md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Genre</h5>
                        <div class="card-body">
                            <form action="{{route('adminpanel.genres-store')}}" method="post">
                                @csrf
                                <div class="form-group mb-3"></div>
                                <label for="name">Name</label>
                                <input type="text" name = "name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-primary"> Create</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <h5>
                        Genres
                    </h5>
                </div>
                <div class="card">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Total books</th>
                                <th>Published Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <br>
                        <tbody>
                            @foreach ($genres as $genre)
                            <tr>
                                <td>{{$genre->id}}</td>
                                <td>{{$genre->name}}</td>
                                <td></td>
                                <td>{{\Carbon\Carbon::parse($genre->created_at)->format('d/m/Y')}}</td>
                                <td>
                                    <form action="{{route('adminpanel.genres-destroy', $genre->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
