<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $casts = [
        'joindate' => 'datetime:d/m/Y',
    ];

    protected $guarded = [];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
