<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginHistory extends Model
{
    /**
     * Disable default timestamps since we use logged_in_at
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     */
    protected $table = 'login_history';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'username',
        'ip_address',
        'user_agent',
        'status',
        'failure_reason',
        'logged_in_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'logged_in_at' => 'datetime',
    ];

    /**
     * Get the user that owns this login history.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Log a successful login attempt.
     */
    public static function logSuccess(User $user, string $ipAddress, string $userAgent): self
    {
        return self::create([
            'user_id' => $user->id,
            'username' => $user->username,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'status' => 'success',
            'logged_in_at' => now(),
        ]);
    }

    /**
     * Log a failed login attempt.
     */
    public static function logFailure(string $username, string $ipAddress, string $userAgent, string $reason = 'Invalid credentials'): self
    {
        return self::create([
            'user_id' => null,
            'username' => $username,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'status' => 'failed',
            'failure_reason' => $reason,
            'logged_in_at' => now(),
        ]);
    }
}

