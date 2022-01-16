<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->with(['subtasks'])->where('id', $value)->firstOrFail();
    }

    public function subtasks()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }
}
