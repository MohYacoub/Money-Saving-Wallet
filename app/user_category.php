<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_category extends Model
{
    public function category_type()
    {
        return $this->belongsTo(category_type::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

}
