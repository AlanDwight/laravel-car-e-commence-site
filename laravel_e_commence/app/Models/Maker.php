<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Maker extends EloquentModel
{
    //
    use HasFactory;
    public $timestamps = false;

    // if factory name doesn't follow convention 
    // define function 

    // protected static function newFactory()
    // {
    //     return CarMakerFactory::new();
    // }

    protected $fillable = [
        'name'
    ]; 

    public function cars() : HasMany 
    {
        return $this->hasMany(Car::class);
    }
    
    public function models() : HasMany 
    {
        return $this->hasMany(Model::class);
    }

}
