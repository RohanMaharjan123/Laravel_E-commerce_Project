@extends('layouts.admin')
@section('title', 'Books')
@section('content')
    <h1 class="page-title">Books</h1>
    <div class="container">
        <div class="text-end mb-3">
            <a href="{{route('adminpanel.books-create')}}" class="btn btn-primary">+&nbsp; Create Books</a>
        </div>
        <br><br><br><br><br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Books</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Genres</th>
                                    <th>Image</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->price }}</td>

                                        <td>
                                            @if(isset($book->genres))
                                                @foreach ($book->genres as $genre)
                                                    {{ $genre->name }}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{-- Display image --}}
                                            <img src=" {{asset('storage/' . $book->image)}}"
                                            alt="" style="height: 40px;">
                                        </td>
                                        <td>{{ $book->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            {{-- Actions --}}
                                            <div class="d-flex">

                                                <a href="{{route('adminpanel.books-edit', $book->id)}}" class="btn">Edit</a>
                                                <form action="{{route('adminpanel.books-destroy', $book->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger-primary">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
