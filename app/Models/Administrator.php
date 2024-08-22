<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Administrator extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * An admin can manage multiple projects
     * @return HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }


    /**
     * Generate a slug for the admin
     * @return string
     */
    public function generateSlug()
    {
        return Str::slug($this->name, '-');
    }
}
