<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\User\Profile\Link;
use Str;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
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
        'twitch',
        'youtube',
        'linkedin',
        'email',
        'color_primary',
        'color_secondary'
    ];

    protected $appends = [
        'user_name',
        'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }

    public function getAvatarAttribute()
    {
        return $this->user->profile_photo_url;
    }

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            $model->code = substr(Str::uuid(), 0, 8);
        });
    }
}