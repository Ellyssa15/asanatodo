<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notepad extends Model
{
    protected $fillable = [
        'title', 'description', 'date', 'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'name');
    }
}
