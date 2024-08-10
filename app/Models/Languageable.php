<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languageable extends Model
{
    protected $fillable = ['language_id', 'title', 'description'];

    public function languageable()
    {
        return $this->morphTo();
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
