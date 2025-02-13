<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    //
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    // this function doesn't need cars() method
    // each state has many cities and each city has many cars

    public function cars() : HasMany 
    {
        return $this->hasMany(Car::class);
    }

    public function city() : HasMany 
    {
        return $this->hasMany(City::class);
    }
}
