<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Responsibility;

class Work extends Model
{
    use HasFactory;

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function responsibilities()
    {
        return $this->hasMany(Responsibility::class, 'work_id', 'id');
    }
}
