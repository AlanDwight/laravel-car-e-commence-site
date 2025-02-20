<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = User::find(1)
                    ->cars()
                    ->with(['primaryImage', 'city', 'maker','model', 'carType', 'fuelType'])
                    ->orderBy('published_at', 'desc')
                    ->get();
        return view('cars.index', [
            'cars' => $cars,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {   
        return view('cars.show', [
            'car' => $car, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('cars.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
    }

    public function search(Request $request)
    { 
        // $query = Car::select('cars.*)->where('published_at', '<', now())
        $query = Car::where('published_at', '<', now())
                ->with(['primaryImage', 'city', 'maker','model', 'carType', 'fuelType'])
                ->orderBy('published_at','desc');

        // filter cars base on city 

        // $query->join('cities', 'cities.id', '=', 'cars.city_id')
        //         ->join('car_types', 'car_types.id', '=', 'cars.car_type_id')
        //         ->where('cities.state_id', 1)
        //         ->where('car_types.id', 7);

        // $query->select('cars.*', 'cities.name as city_name');
        
        // $carCount = $query -> count();
        $cars = $query->paginate(6);
        // $cars = $query->limit(30)->get();
        // dd($cars[0]->getattributes()['city_name']    );
        return view('cars.search', [
            'cars' => $cars,
        ]);
    }

    public function watchlist(){ 
        // TODO we comback to this 
        // hard-coded user id
        
        $cars = User::find(4)
                ->favouriteCars()
                ->with(['primaryImage', 'city', 'maker','model', 'carType', 'fuelType'])
                ->get();
        return view('cars.watchlist', [
            'cars' => $cars, 
        ]);
    }
}
