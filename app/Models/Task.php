<?php

namespace App\Models;

use App\Models\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'task',
        'max_date',
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany(Log::class, 'task_id', 'id');
    }
}
