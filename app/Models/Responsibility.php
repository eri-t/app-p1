<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;

class Responsibility extends Model
{
    use HasFactory;

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
