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
        $query = Car::where('published_at', '<', now())
                ->orderBy('published_at','desc');
        
        $carCount = $query -> count();

        $cars = $query->limit(30)->get();

        return view('cars.search', [
            'cars' => $cars,
            'carCount' => $carCount,
        ]);
    }
}
