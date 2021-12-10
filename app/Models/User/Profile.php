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
    ];

    protected $appends = [
        'user_name'
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

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            $model->code = substr(Str::uuid(), 0, 8);
        });
    }
}