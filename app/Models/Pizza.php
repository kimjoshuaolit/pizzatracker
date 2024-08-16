<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pizza extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'toppings' => 'array',
    ];

    protected $hidded = [
        'users'
    ];

    protected $appends = [
        'chef',
    ];


    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function getChefAttribute(): string {
        return optional($this->user)->name ?? 'Unknown Chef';

    }

    public function getLastUpdatedAttribute(): string {

        return $this ->updated_at->diffForHumans();
    }
}
