<?php

namespace App\Models\User\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'title',
        'url',
        'icon',
        'order',
    ];
}
