<?php

namespace Webkul\Sms\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtpCode extends Model
{
    use HasFactory;

    protected $table = 'otp_codes';

    protected $fillable = [
        'token',
        'phone',
        'purpose',
        'otp_hash',
        'digits',
        'attempts',
        'max_attempts',
        'expires_at',
        'consumed_at',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'expires_at'  => 'datetime',
        'consumed_at' => 'datetime',
    ];

    public function scopeActive($q)
    {
        return $q->whereNull('consumed_at')->where('expires_at', '>', now());
    }
}
