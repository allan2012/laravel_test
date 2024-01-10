<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'project_id', 'priority'];

    const MAX_PRIORITY_VAL = 2147483647;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
