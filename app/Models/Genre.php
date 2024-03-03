<?php

namespace App\Models;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    protected $secured = [];
    public function books (){
        return $this->hasMany(Books::class);
    }
}
