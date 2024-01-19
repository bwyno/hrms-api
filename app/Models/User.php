<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email_address',
        'google_id', // Added
        'avatar',
        'birthdate',
        'age',
        'sex',
        'marital_status',
        'nationality',
        'ss_number',
        'primary_address',
        'secondary_address',
        'contact_number_1',
        'contact_number_2',
        'date_hired',
        'employment_status',
        'position_id',
        //'department_id',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    public function position (): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
