<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user_category()
    {
        return $this->belongsTo(user_category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
