<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Payment extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $casts = [
        'payment_date' => 'date'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAmountAttribute(): float|int
    {
        return round($this->attributes['amount'] / 100, 2);
    }

    public function searchableAs(): string
    {
        return 'payments_index';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date->format('d-m-Y'),
            'user' => [
                'name' => $this->user->name
            ]
        ];
    }

}
