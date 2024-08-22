<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Interpreter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'interpreter_name',
        'availability',
        'service',
    ];

    /**
     * An interpreter belongs to a user
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An interpreter has many interpretation requests
     * @return HasMany
     */
    public function interpretationRequests()
    {
        return $this->hasMany(InterpretationRequest::class);
    }

    /**
     * Generate a slug for the interpreter
     * @return string
     */
    public function generateSlug()
    {
        return Str::slug($this->interpreter_name, '-');
    }
}
