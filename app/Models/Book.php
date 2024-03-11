<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    // has one category

    protected $guarded = [];
    protected $fillable = ['title', 'genre_id', 'price', 'description', 'image'];
    // public function genre(){
    //     return $this->hasMany(Genre::class);
    // }
    public function genre()
{
    return $this->belongsTo(Genre::class);
}


//     public function genre()
// {
//     return $this->belongsToMany(Genre::class, 'book_genre', 'book_id', 'genre_id');
// }

    
}
