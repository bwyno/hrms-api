<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    use HasFactory;

    protected  $fillable = [
        'user_id',
        'leave_type_id',
        'leave_date_from',
        'leave_date_to',
        'reason',
        'status',
    ];

    //todo: create a status function
    protected  $attributes = [
        'status' => 'Pending'
    ];

    public function leaveType(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
