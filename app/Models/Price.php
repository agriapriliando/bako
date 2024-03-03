<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Price extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
