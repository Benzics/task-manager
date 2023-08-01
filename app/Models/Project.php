<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The tasks for this project
     */
    public function tasks(): HasMany 
    {
        return $this->hasMany(Task::class);
    }

    public static function boot()
    {
        parent::boot();
        
        self::deleting(function($project)
        {
            $project->tasks()->each(function($task)
            {
                $task->delete();
            });
        });
    }
}
