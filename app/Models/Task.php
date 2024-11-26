<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'subject',
        'description',
        'priority',
        'status',
        'endDate',
    ];

    public function likes()
    {
        return $this->hasOne(User::class);
    }
}
