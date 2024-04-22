<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'assignee',
        'due_date',
        'status'
    ];

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function getDueDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d F Y');
    }
}
