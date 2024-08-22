<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * A message belongs to a user
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A message belongs to an administrator
     * @return BelongsTo
     */
    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }
}
