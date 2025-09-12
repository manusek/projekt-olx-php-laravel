<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    use HasFactory;
    protected $fillable = ['name', 'img'];
}
