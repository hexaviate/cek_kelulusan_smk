<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
