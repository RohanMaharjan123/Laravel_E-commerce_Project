    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <a href = "{{route('book', $book->$id)}}" class="product-box">
        <div class="image">
            <img src="{{asset('img/books/Meditations.jpg')}}" alt="">
        </div>
        <div class="book-title">{{$product->title}}</div>
        <div class="book-genre">Philosophy</div>
        <div class="book-price">Rs.800</div>
    </a>