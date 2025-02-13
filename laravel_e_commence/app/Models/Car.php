<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Car extends EloquentModel
{
    use HasFactory, SoftDeletes;
    //

    // to allow the user to fill in the database for security reason 
    protected $fillable = [
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'city_id',
        'address',
        'phone',
        'description',
        'published_at',
    ];

    // if empty every column of the table can be filled 
    // else block the specify column to be filled 

    // protected $guarded = ['user_id']; 

    // one to one relationship 
    public function features() : HasOne
    { 
        return $this->hasOne(CarFeatures::class, 'car_id');
    }

    public function primaryImage() : HasOne
    {
        return $this->hasOne(CarImage::class, 'car_id')
                    ->oldestOfMany('position');
    }
    // one to many relationship
    public function images() : HasMany // return type // not mandatory
    {
        return $this->hasMany(CarImage::class, 'car_id');
    }

    // many to one relationship
    // each car belong to one car type
    // but car type has many cars  
    public function carType() : BelongsTo
    {
        return $this->belongsTo(CarType::class);
    }

    public function fuelType() : BelongsTo {
        return $this->belongsTo(FuelType::class);
    }
    
    public function model() : BelongsTo {
        return $this->belongsTo(Model::class);
    }
    
    public function maker() : BelongsTo {
        return $this->belongsTo(Maker::class);
    }

    
    public function owner() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city() : BelongsTo {
        return $this->belongsTo(City::class);
    }

    // many to many relationship 

    public function favouredUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favourite_cars'); // , 'car_id', 'user_id');
    }

    public function getCreatedDate() : String {
        return (new Carbon($this->created_at))->format('Y-m-d');
    }
}
