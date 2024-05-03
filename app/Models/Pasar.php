<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function image(): Attribute
    {
        return new Attribute(
            get: fn () => url('/storage/images/pasar/' . $this->attributes['gambar']),
        );
    }
}
