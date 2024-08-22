<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'edad',
        'es_socio',
        'diversidad_funcional',
        'diversidad_descripcion',
        'email',
        'telefono',
        'project_id',
        'slug',
    ];

    /**
     * A student belongs to a project.
     *
     * @return BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * A student belongs to a user.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * Get all projects associated with the student.
     *
     * @return BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_student', 'user_id', 'project_id');
    }




    /**
     * This function is used to generate a slug for the student.
     *
     * @return string
     */
    public function generateSlug()
    {
        return Str::slug($this->nombre, '-');
    }
}
