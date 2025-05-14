<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class Article extends Model
{
    protected $fillable = ['title', 'photo', 'description'];

    public function getImageUrlAttribute()
    {

        return Storage::disk('s3')->url($this->photo);
    }
}
