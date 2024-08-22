<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * A project belongs to an administrator
     * @return BelongsTo
     */
    public function administrator()
    {
        return $this->belongsTo(Administrator::class, 'admin_id');
    }

    /**
     * A project belongs to a team
     * @return BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'project_team');
    }

    /**
     * This function generates a slug for the project
     *
     */
    public function generateSlug()
    {
        return Str::slug($this->name, '-');
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'project_student', 'project_id', 'student_id');
    }


    /**
     * This function bootstraps the project model
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($project) {
            $teams = Team::all();
            $project->teams()->sync($teams);
        });
    }



}
