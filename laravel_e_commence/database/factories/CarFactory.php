<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\City;
use App\Models\User;
use App\Models\CarFeatures;
use App\Models\CarImage;
use App\Models\Maker;
use App\Models\Model;
use App\Models\FuelType;
use App\Models\CarType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'maker_id' => Maker::inRandomOrder()->first()->id,
            'model_id' => function(array $attributes){ 
                return Model::where('maker_id', $attributes['maker_id'])
                        ->inRandomOrder()
                        ->first()
                        ->id;
            }, 
            'year' => fake()->year(),
            'price' => ((int)fake()->randomFloat(2, 5, 100)) * 1000, // max deci, min value ,max value
            'vin' => strtoupper(Str::random(17)),
            'mileage' => ((int)fake() -> randomFloat(2, 5,500))* 1000, 
            'car_type_id' => CarType::inRandomOrder()->first()->id, 
            'fuel_type_id' => FuelType::inRandomOrder()->first()->id, 
            'user_id' => User::inRandomOrder()->first()->id, 
            'city_id' => City::inRandomOrder()->first()->id, 
            'address' => fake()->address(),
            'phone' => function (array $attributes) { 
                return User::where('id', $attributes['user_id'])->first()->phone; 
                // return User::find($attributes['user_id'])->phone;
            },
            'description' => fake()-> text(2000),
            'published_at' => fake()-> optional(0.9) 
                    ->datetimeBetween('-1 month', '+1 day'), 
                    // optional(0.9) means 90% probability 
        ];
    }
}
