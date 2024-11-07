@extends('layouts.master')
@section('title', $book->title)
@section('content')
    <div class="book-page">
        <div class="container">
            <div class="book-page-row">
                <section class="book-page-image">
                    <img src="{{asset('storage/' . $book->image)}}" alt="">
                </section>
                <section class="book-page-details">
                    <p class="b-title">{{$book->title}}</p>
                    <p class="b-price">{{$book->price}}</p>
                    <p class="b-genre">{{$book->genre->name}}</p>
                    <p class="b-description">{{$book->description}}</p>
                    <form action="{{route('addToCart', $book->$id)}}" method="post">
                        <div class="p-form">
                            <div class="p-quantity">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" min="1" max="100" value="1" required>
                            </div>
                            <button type="submit" class="btn btn-cart">Add To Cart</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
