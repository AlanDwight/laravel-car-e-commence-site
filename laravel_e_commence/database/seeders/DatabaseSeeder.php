<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\State;
use App\Models\City;
use App\Models\Maker;
use App\Models\Model;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarFeatures;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // calling custom seeder class from default seeder class 

        // $this->call([
        //     UsersSeeder::class,
        // ]);

        CarType::factory()
        ->sequence(
            ['name'=>'Sedan'],
            ['name'=>'HatchBack'],
            ['name'=>'SUV'],
            ['name'=>'Pickup Truck'],
            ['name'=>'Minivan'],
            ['name'=>'Jeep'],
            ['name'=>'Coupe'],
            ['name'=>'Crossover'],
            ['name'=>'Sports Car']
            )
            ->count(9)
            ->create();
        
        FuelType::factory()->count(4)->sequence(
            ['name' => 'Gasoline'],
            ['name' => 'Diesel'],
            ['name' => 'Electric'],
            ['name' => 'Hybrid'],
        )->create();
        
        $states = [
            "California" => ["Los Angeles", "San Francisco", "San Diego", "Sacramento"],
            "Texas" => ["Houston", "Dallas", "Austin", "San Antonio"],
            "Florida" => ["Miami", "Orlando", "Tampa", "Jacksonville"],
            "New York" => ["New York City", "Buffalo", "Rochester", "Albany"],
            "Illinois" => ["Chicago", "Springfield", "Naperville", "Peoria"],
            "Ohio" => ["Columbus", "Cleveland", "Cincinnati", "Toledo"],
            "Pennsylvania" => ["Philadelphia", "Pittsburgh", "Allentown", "Erie"],
            "Georgia" => ["Atlanta", "Savannah", "Augusta", "Macon"],
            "North Carolina" => ["Charlotte", "Raleigh", "Greensboro", "Durham"],
            "Michigan" => ["Detroit", "Grand Rapids", "Ann Arbor", "Lansing"]
        ];

        foreach($states as $state => $cities){ 
            State::factory()
                ->state(['name' => $state])
                ->has(City::factory()
                    ->count(count($cities))
                    ->sequence(...array_map(fn($city)=>(['name' => $city]), $cities ))
                    )
                    ->create();
        }

        $car_makers_models = [
            "Toyota" => ["Corolla", "Camry", "RAV4", "Highlander", "Supra"],
            "Honda" => ["Civic", "Accord", "CR-V", "Pilot", "Fit"],
            "Ford" => ["Mustang", "F-150", "Explorer", "Focus", "Bronco"],
            "Chevrolet" => ["Camaro", "Silverado", "Malibu", "Tahoe", "Impala"],
            "BMW" => ["3 Series", "5 Series", "X5", "X3", "M4"],
            "Mercedes-Benz" => ["C-Class", "E-Class", "S-Class", "GLC", "GLE"],
            "Audi" => ["A3", "A4", "A6", "Q5", "Q7"],
            "Volkswagen" => ["Golf", "Jetta", "Passat", "Tiguan", "Atlas"],
            "Nissan" => ["Altima", "Maxima", "Rogue", "Pathfinder", "GT-R"],
            "Hyundai" => ["Elantra", "Sonata", "Tucson", "Santa Fe", "Kona"],
            "Kia" => ["Forte", "Optima", "Sorento", "Sportage", "Stinger"],
            "Subaru" => ["Impreza", "Outback", "Forester", "WRX", "Legacy"],
            "Tesla" => ["Model S", "Model 3", "Model X", "Model Y", "Cybertruck"],
            "Porsche" => ["911", "Cayenne", "Panamera", "Taycan", "Macan"],
            "Ferrari" => ["488", "F8 Tributo", "Roma", "SF90 Stradale", "812 Superfast"],
            "Lamborghini" => ["Huracan", "Aventador", "Urus", "Revuelto", "Gallardo"],
            "Bugatti" => ["Chiron", "Veyron", "Divo", "Bolide", "Centodieci"],
            "Maserati" => ["Ghibli", "Levante", "Quattroporte", "MC20", "GranTurismo"],
            "Jaguar" => ["XE", "XF", "F-PACE", "I-PACE", "F-TYPE"],
            "Rolls-Royce" => ["Phantom", "Ghost", "Wraith", "Dawn", "Cullinan"],
            "Bentley" => ["Continental GT", "Flying Spur", "Bentayga", "Mulsanne"],
            "Aston Martin" => ["DB11", "Vantage", "DBS Superleggera", "Valhalla", "Valkyrie"]
        ];

        foreach($car_makers_models as $maker => $models){ 
            Maker::factory()
                ->state(['name' => $maker])
                ->has(Model::factory()
                            ->count(count($models))
                            ->sequence(...array_map(fn($model)=>(['name' => $model]), $models))
                            , 'models')
                ->create();
        }

        // foreach($states as $state => $cities){ 
        //     State::factory()
        //         ->state(['name' => $state])
        //         ->has(City::factory()->
        //                 ->count(count($cities))
        //                 ->sequence(...array_map(fn($city)=>(['name'=> $city]), $cities))
        //                 )
        //         ->create();    
        // }

        User::factory()
            ->count(3)
            ->create();
        
        User::factory()
            ->count(2)
            ->has(Car::factory()
                    ->count(50)
                    ->has(CarImage::factory()
                                    ->count(5)
                                    ->sequence(fn(Sequence $sequence) => (['position' => $sequence->index % 5 + 1]))
                                    // ->sequence(
                                    //     ['position' => 1],
                                    //     ['position' => 2],
                                    //     ['position' => 3],
                                    //     ['position' => 4],
                                    //     ['position' => 5],
                                    // )
                                    // ->create()              
                        , 'images')
                    ->has(CarFeatures::factory()
                                    // ->create()
                        , 'features')
                    // ->create()
                    ,'favouriteCars'
            )
            ->create();
    }
}