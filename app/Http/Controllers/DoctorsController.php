<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class DoctorsController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user()->id;

        $doctors = User::where('is_doctor', 'true')
            ->select('name', 'email', 'phone_number', 'is_active')
            ->paginate(10);

        return Inertia::render('Doctors', [
            'doctors' => $doctors
        ]);
    }
}
