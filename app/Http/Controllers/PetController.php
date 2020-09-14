<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{

    public function index()
    {
        $pets = new Pet();
        $pets = $pets->all();
        return response()->json($pets,200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Pet $pet)
    {
        //
    }

    public function update(Request $request, Pet $pet)
    {
        //
    }

    public function destroy(Pet $pet)
    {
        //
    }
}
