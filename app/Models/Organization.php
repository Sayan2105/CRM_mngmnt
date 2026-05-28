<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'owner_id',
        'email',
        'phone',
        'logo',
        'is_active',
    ];

    public function owner(): BelongsTo {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
}
