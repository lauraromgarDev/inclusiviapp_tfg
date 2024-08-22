<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestChange extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'interpretation_request_id',
        'admin_id',
        'user_id',
        'interpreter_id',
        'change_description',
    ];

    /**
     * A request change belongs to an interpretation request
     * @return BelongsTo
     */
    public function interpretationRequest()
    {
        return $this->belongsTo(InterpretationRequest::class);
    }

    /**
     * A request change belongs to an administrator
     * @return BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Administrator::class);
    }

    /**
     * A request change belongs to a user
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A request change belongs to an interpreter
     * @return BelongsTo
     */
    public function interpreter()
    {
        return $this->belongsTo(Interpreter::class);
    }
}

