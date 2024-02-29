<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    use HasFactory;
    // has one category

    protected $guarded = [];
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
