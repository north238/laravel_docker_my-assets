<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    protected $fillable = [
        'name',
        'amount',
        'registration_date',
        'user_id',
        'category_id',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'registration_date' => 'date:Y-m-d'
    ];
    
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
}
