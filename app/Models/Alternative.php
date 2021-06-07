<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    public function major () {
      return $this->belongsTo(Major::class);
    }

    public function university () {
      return $this->belongsTo(University::class);
    }
}
