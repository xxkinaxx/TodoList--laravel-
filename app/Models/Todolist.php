<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity',
        'status',
        'deadline',
        'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
