<?php

// VehicleController.php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query();

        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        if ($request->has('brand')) {
            $query->where('brand', 'like', '%' . $request->brand . '%');
        }

        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('rental_price', [$request->price_min, $request->price_max]);
        }

        $vehicles = $query->get();

        return view('vehicles.index', compact('vehicles'));
    }


    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $vehicle = new Vehicle($request->all());
        $vehicle->save();
        return redirect()->route('vehicles.index');
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());
        return redirect()->route('vehicles.index');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index');
    }
}

