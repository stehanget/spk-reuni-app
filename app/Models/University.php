<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function location () {
      return $this->belongsTo(Location::class);
    }

    public function alternatives () {
      return $this->hasMany(Alternative::class);
    }
}
