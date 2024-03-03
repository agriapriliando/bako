<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
