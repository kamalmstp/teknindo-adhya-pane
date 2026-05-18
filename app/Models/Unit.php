<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //

    // add fillable
    protected $fillable = ['name', 'description'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    // relation to refuelings
    public function refuelings()
    {
        return $this->hasMany(Refueling::class);
    }

    // relation to haulings
    public function haulings()
    {
        return $this->hasMany(Hauling::class);
    }
}
