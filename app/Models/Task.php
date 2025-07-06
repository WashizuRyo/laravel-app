<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'completed_at'];

    public function Tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
