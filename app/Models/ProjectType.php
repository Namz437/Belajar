<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    protected $fillable = ['type','description'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'mapping_project_project_type', 'project_type_id', 'project_id');
    }
}

