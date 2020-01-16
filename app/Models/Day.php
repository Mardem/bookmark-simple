<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['day_name'];

    public function hours()
    {
        return $this->hasMany(HoursDay::class);
    }
}
