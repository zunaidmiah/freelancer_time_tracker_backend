<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\TimeLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'client_id',
        'status',
        'deadline'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function timeLogs()
    {
        return $this->hasMany(TimeLog::class);
    }
}
