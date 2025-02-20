<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\CarFeatures;
use App\Models\CarImage;
use App\Models\Maker;
use App\Models\Model;
use App\Models\FuelType;
use App\Models\CarType;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\Sequence;

class HomeController extends Controller
{
    //
    // public function index(float $a, float $b){ 
    //     return view("home.welcome", [
    //         "a"=> $a,
    //         "b"=> $b,
    //         // conditional styling 
    //         'foo' => 'bar',
    //         'red' => 'confirm', 
    //         'color' => 'red' ]);
    // }    

    public function index(){
        
        // select all cars 
        // $cars = Car::get();

        // select specific cars base on table column name
        // $cars = Car::where('year', '!=', '2020')->get();

        // select first car
        // $cars = Car::first();

        // find car base on id 
        // $cars = Car::find(2);

        // sorting cars base on descending id 
        // $cars = Car::orderBy('id', 'desc')->limit(2)->get();
        
        // combined filter
        // $cars = Car::where('year', '!=', 'null')
        //             ->where('user_id', '1')
        //             ->where('address', 'test')
        //             ->orderBy('id', 'desc')
        //             ->limit(2)
        //             ->get();

        // dump($cars);

        // insert new car in the database 

        // $car = new Car();
        // $car -> maker_id =1 ; 
        // $car -> model_id = 1 ; 
        // $car -> year = 2018; 
        // $car -> price = 35000; 
        // $car -> vin = 5;
        // $car -> mileage = 123 ;   
        // $car -> car_type_id = 1;
        // $car -> fuel_type_id = 1;
        // $car -> user_id =1 ; 
        // $car -> city_id = 1; 
        // $car -> address = 'test'; 
        // $car -> phone = '12345';
        // $car -> description = null; 
        // $car -> published_at = now(); 
        // $car -> save();


        // $carData = [
        //     'maker_id' => 2,
        //     'model_id' => 2,
        //     'year' => 2017,
        //     'price' => 45000,
        //     'vin' => 6,
        //     'mileage' => 133,
        //     'car_type_id' => 1,
        //     'fuel_type_id' => 1,
        //     'user_id' => 1,
        //     'city_id' => 1,
        //     'address' => 'test',
        //     'phone' => '12345',
        //     'description' => null,
        //     'published_at' => now(),
        // ];
        // approach one 
        // $car = Car::create($carData); 

        // approach two 
        // $car2 = new Car(); 
        // $car2->fill($carData);
        // $car2->save();

        // approach three
        // $car3 = new Car($carData);
        // $car3->save();

        // update specfic attribute or data from column 
        // base on id
        // update data  
        // $car = Car::find(1); 
        // $car->price = 1000; 
        // $car->save();
        
        // $carData2 = [
        //     'maker_id' => 2,
        //     'model_id' => 2,
        //     'year' => 2017,
        //     'price' => 135000,
        //     'vin' => 7,
        //     'mileage' => 133,
        //     'car_type_id' => 1,
        //     'fuel_type_id' => 1,
        //     'user_id' => 1,
        //     'city_id' => 1,
        //     'address' => 'test',
        //     'phone' => '12345',
        //     'description' => null,
        //     'published_at' => now(),
        // ];
        
        // update or create using updateOrCreate method
        // need to pass two array
        // first one is filter associated array
        // second one is updated data

        // Car::updateOrCreate([
        //     'vin' => '7', 
        //     'price' => 45000, 
        // ],[
        //     'price' => 55000,
        // ]);

        // Car::updateOrCreate([
        //     'vin' => '7', 
        //     'price' => 45000, 
        // ],
        //     $carData2
        // );

        // mass update data base on filter 
        // Car::where('published_at', null)
        //     ->where('user_id', 1)
        //     ->update(['published_at' => now(),]);

        // delete data 
        // $car = Car::where('price', 35000)
        //             ->where('vin', 5)
        //             ->first();
        // $car->delete();

        // mass delete database entries
        // $car = Car::find(1); 
        // $car-> delete();

        // Car::destroy([2,3]);
        // Car::destroy(1,2);

        // Car::where('published_at', null) 
        //       -> where('user_id', 1) 
        //       -> delete();

        // delete all cars from database // actually delete entries from database
        // Car::truncate(); 

        // challenge 

            // $car = Car::where('price', '>', 20000)
            //         ->get();
            // $car = Maker::where('name', 'Toyota')
            //                 ->get();

            // $fuel = FuelType::create([
            //     'name' => 'solar',
            // ]);

            // $fuel = new FuelType(); 
            // $fuel ->fill([
            //     'name' => 'solar', 
            // ]) -> save();
            
            // $fuel = new FuelType([
            //     'name' => 'solar',
            // ]);
            // $fuel ->save();

            // FuelType::find(8)->delete();

            // $car = Car::find(1);
            // $car->price=15000;
            // $car->save();

            // $car = Car::where('year', '<' , '2013')
            //             ->delete();
            // $car = Car::where('year', '!=' , null)
            //             ->delete();
            // $fuel = FuelType::where('name', 'solar')
            //                     ->delete();
            // dump($car); 


            // dump($fuel);
        

        // one to one 
        // $car = Car::find(1); 
        // dump($car->features, $car->primaryImage);
        
        // updating property 
        
        //approach one
        // $car->features->abs=0; 
        // $car->features->save();
        
        //approach two
        // $car->features->update(['abs' => 1]);

        //deleting 
        // $car->primaryImage->delete();

        // $carFeatures = new CarFeatures([
        // 'abs' => false, 
        // 'air_conditioning' => false,
        // 'power_windows' => false,
        // 'power_door_locks' => false,
        // 'cruise_control' => false,
        // 'bluetooth_connectivity' => false,
        // 'remote_start' => false,
        // 'gps_navigation' => false,
        // 'heated_seats' => false,
        // 'climate_control' => false,
        // 'rear_parking_sensors' => false,
        // 'leather_seats' => false,
        // ]);

        // $car = Car::find(3);
        // $car->features()->save($carFeatures);

        // getting image relationship 
        // $car = Car::find(1);
        // dump($car -> images);

        // adding new car image 

        // $car = Car ::find(1);
        // approach one 
        // $image = new CarImage([
        //     'image_path' => 'url://something',
        //     'position' => '3'
        // ]);

        // $car->images()->save($image);
        
        // approach two 
        // $car -> images()-> create([
            // 'image_path' => 'url://something new',
            // 'position' => 4,
        // ]);

        // dump($car->images);
        // dump($car->images->last());
        // dump($car->images->first());

        // CarImage::where('position',4)->delete();

        // save many images via saveMany()
        // $car->images()->saveMany(
        //     [
        //         new CarImage([
        //             'image_path' => 'url://something new 4',
        //             'position' => 4,
        //         ]), 
        //         new CarImage([
        //             'image_path' => 'url://something new 5',
        //             'position' => 5,
        //         ]), 
        //         new CarImage([
        //             'image_path' => 'url://something new 6',
        //             'position' => 6,
        //         ]), 
        //     ]
        //     );
        
        // save many images via creatMany()
        // $car->images()->createMany([
        //     [
        //         'image_path' => 'url://something new 7',
        //         'position' => 7,
        //     ], 
        //     [
        //         'image_path' => 'url://something new 8',
        //         'position' => 8,
        //     ], 
        //     [
        //         'image_path' => 'url://something new 9',
        //         'position' => 9,
        //     ], 
        // ]);
        
        // $car = Car::find(1);
        // dump($car->carType );
        // $carType =CarType::where('name', 'Hatchback')->first(); // will return id of 2
        
        // short way 
        // $car = $carType->cars; 
        
        // long way 
        // $car = Car::whereBelongsTo($carType) -> get();  // there is a car with car_type_id of 2 
        // dump($car);

        // updating car_type_id

        // $car = Car::find(2); 
        // $carType = CarType::where('name', 'Jeep')->first(); 
        
        // first way
        // $car->car_type_id = $carType->id;
        // $car->save();

        // second way 
        // $car->carType()->associate($carType);
        // $car->save();

        // many to many 
        // $car = Car :: find(1);
        // dump($car->favouredUsers);
        
        // $user = User::find(1); 
        // dump($user->favouriteCars);

        // adding new favourite cars of user by car id 3, 4
        // $user = User::find(1); 
        // $user->favouriteCars()->attach([1,2,3,4]);
        
        // replacing everything with entry of given id  
        // $user -> favouriteCars()-> sync([1]);
        
        // with additional columns 
        // $user -> favouriteCars()-> syncWithPivotValue([1], ['column1'=> 'value1']);

        // delete favourite table data

        // $user = User::find(1);
        // $user -> favouriteCars() -> detach([3,4]);
        
        // delete all detach all 
        // $user -> favouriteCars() -> detach();

        // Factory

        // create new fake record in maker table
        
        // save the record to the table  
        // $maker = Maker::factory()->create();

        // not save the record to the table only call an instant of Maker class
        // $maker = Maker::factory()->make();
        
        // create multiple fake record
        // $maker = Maker::factory()->count(5)->create();
        // dump($maker);

        //create and add new users 
        // User::factory()->count(3)->create([
        //     'name' => 'zin'
        // ]);
        //create and add new users and setting null at email_verified_at column
        // User::factory()->count(3)->unverified()->create([
        //     'name' => 'zin'
        // ]);

        // using squence to create sequencetial records 

        // User::factory()->count(4)->sequence(
        //     ['name' => 'sunny'],
        //     ['name' => 'linda'],
        //     ['name' => 'jack'],
        //     ['name' => 'tuna'],
        //     )->create();
         
        // User::factory()->count(4)
        // ->sequence(
        //     fn (Sequence $sequence) => ([
        //         'name' => 'Name ' . $sequence->index 
        //     ])
        //     )->create();

        // state 
        // using state to overwrite predefined column value 'email_verified_at' => now() to null value 

        // User::factory()->state([ 'email_verified_at' => null ])->create();
        // User::factory()->create();

        // factory callback function 
        // for logging and extras 

        // User::factory()
        
        // ->afterCreating(function (User $user) { 
        //     dump ($user)
        // })
        // ->create();

        // ->afterMaking(function (User $user) { 
        //     dump ($user)
        // })
        // ->make();

        // Maker factory 
        // hasMany
        // keyword has() a maker has models 

        // Maker::factory()
        //     ->count(1)
        //     ->hasModels(1, ['name' => 'test'])
            // ->hasModels(1, function(array $attributes, Maker $maker){ 
            //     return [];
            // })
            
            // has() method
            // ->has(Model::factory()-> count(4))
            
            // if the relation name was different (carModels method inside Maker.php model)
            // ->has(Model::factory()-> count(4), 'carModels')
            
            // ->create();
        

        // model factory
        // belongsTo
        // keyword for() models for a maker

        // when creating records for model table we need to provide which 
        // maker own this model 
        // for model factory we need to define this model belong to which maker
        // with maker_id 
        // there is a maker method in Model.php class 

        // Model::factory()
        //     ->count(5)
            
            // ->forMaker() // blank parameter will autocreate new maker  
            // ->forMaker(['name' => 'nissan']) // name associated array provided to create new maker  
            
            // generic for() method 
            // ->for(Maker::factory()->state(['name'=>'lexus']))

            // if relationship name is being different for example 'carMaker'
            // ->for(Maker::factory()->state(['name'=>'jatour']), 'carMaker')    
            // ->create();
        
        // create a maker and assign 5 models to it when creating models 
        
        // using state()
        // $maker = Maker::factory()
        //     ->state(['name' => 'bmw'])
        //     ->create();

        // OR

        // using create() 
        // $maker = Maker::factory()
        //             ->create(['name' => 'jagour']);
    
        // Model::factory()
        //     ->count(3)  
        //     ->for($maker)
        //     ->create();

        // factory: many to many relationship
        
        // User::factory()
        //     ->has(Car::factory()->count(5),'favouriteCars')
        //     // if pivot table has additional columns 
        //     // ->hasAttached(Car::factory()->count(5),['col_1' => 'value', 'col_2' => 'value'])
        //     ->create();

        // adding eager loading
        $cars = Car::where('published_at', '<', now())
                    ->with(['primaryImage', 'city', 'maker','model', 'carType', 'fuelType'])
                    ->orderBy('published_at', 'desc')
                    ->limit(30)
                    ->get();

        return view("home.index", [
            'cars' => $cars,
        ]);
    }
}
