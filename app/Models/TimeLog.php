<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TimeLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'start_time',
        'end_time',
        'description',
        'hours'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
