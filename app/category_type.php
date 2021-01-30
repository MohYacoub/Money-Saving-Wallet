<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_type extends Model
{
    public function user_category()
    {
        return $this->hasMany(user_category::class);
    }
}
