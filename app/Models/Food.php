<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Http\Requests\DiscountRequest;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'materials',
        'discount_id',
        'type_id',
        'restaurant_id'
    ];

    protected $hidden = [
        'discount_id',
        'type_id',
        'restaurant_id' 
    ];
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(FoodCategory::class);
    }

    // public function comments()
    // {
    //     return $this->belongsToMany(Comment::class, 'comment_food');
    // }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
