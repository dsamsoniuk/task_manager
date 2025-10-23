<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'priority',
        'is_visible',
    ];
    public function project() {
        return $this->belongsTo(Project::Class);
    }
}
