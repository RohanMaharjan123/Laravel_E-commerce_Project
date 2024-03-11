    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <section class="book-box">
        @if($book->image && file_exists(public_path('storage/' . $book->image)))
            <div class="image">
                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
            </div>
        @else
            <div class="image">
                <p>No image available</p>
            </div>
        @endif
        <div class="book-title">{{$book->title}}</div>
        <div class="book-genre">Philosophy</div>
        <div class="book-price">{{$book->price}}</div>
    </section>
    
    {{-- <a href = "{{route('book', $book->$id)}}" class="product-box">
    </a> --}}