<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Price extends Model
{
    use \Znck\Eloquent\Traits\BelongsToThrough;
    use HasFactory;

    protected $guarded = ['id'];
    // public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class, "item_id");
    }

    public function pasar()
    {
        return $this->belongsTo(Pasar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsToThrough(Category::class, Item::class);
    }

    public function createdAtEdit(): Attribute
    {
        return new Attribute(
            get: fn () => Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->translatedFormat('j F Y H:i'),
        );
    }

    // protected function updatedAtEdit(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Carbon::createFromFormat('Y-m-d H:i:s', $value)->translatedFormat('j F Y H:i'),
    //     );
    // }

    // public function getUpdatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->translatedFormat('j F, Y H:i');
    // }

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d H:i:s',
    //     'updated_at' => 'datetime:Y-m-d H:i:s',
    // ];
}
