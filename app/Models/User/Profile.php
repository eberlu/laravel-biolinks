<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\User\Profile\Link;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'url',
        'nickname',
        'description',
        'facebook',
        'instagram',
        'tiktok',
        'twitter',
        'gmaps',
        'whatsapp',
        'phone',
        'phone_2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }
}