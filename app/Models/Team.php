<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Team extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * A team belongs to an administrator
     * @return BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_team');
    }

    /**
     * This function generates a slug for the team
     */
    public function generateSlug()
    {
        return Str::slug($this->name, '-');
    }


}
