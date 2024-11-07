<?php

namespace App\View\Components;

use Closure;
use App\Models\Book;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class BookBox extends Component
{
    /**
     * Create a new component instance.
     */
    // public function __construct()
    // {
    //     //
    // }
    public $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-box');
    }
}
