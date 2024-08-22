<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InterpretationRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'interpreter_id',
        'request_date',
        'request_message',
        'status',
    ];

    /**
     * An interpretation request belongs to a user
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An interpretation request belongs to an interpreter
     * @return BelongsTo
     */
    public function interpreter()
    {
        return $this->belongsTo(Interpreter::class);
    }
}
