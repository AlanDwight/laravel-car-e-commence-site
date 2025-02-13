<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuelType extends Model
{
    use HasFactory;
    // customizing model for table mapping 
    // check with php artisan model:show FuelType

    // protected $table = 'car_fuel_types'; 

    // customizing primary key default would be 'id' as primary key from 
    // 'fuel_types' migration table but we can redefine it by
    
    // protected $primaryKey = 'fuel_type_id';

    // disabling auto incrementing primary key 
    // public $incrementing = false;

    // change primary key data type from 'int' to 'str'
    // protected $keyType = 'string';

    // disabling timestamp
    public $timestamps = false;
    
    // customizing for created_at and updated_at names

    // const CREATED_AT = 'created_date';
    // const UPDATED_AT = 'updated_date';
    // const UPDATED_AT = null;

    protected $fillable = [ 
        'name'
    ];

    public function cars() : HasMany 
    {
        return $this->hasMany(Car::class);
    }
}
