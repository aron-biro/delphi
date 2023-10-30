<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = 4;

        $income = User::join('appointments', 'users.id', '=', 'appointments.user_id')
        ->join('services', 'appointments.service_id', '=', 'services.id')
        ->where('users.id', $userId)
        ->select(
            'services.title as service_name',
            \DB::raw('SUM(services.price) as total_income'),
            \DB::raw('COUNT(appointments.id) as total_appointments')
        )
        ->groupBy('services.title')
        ->get();


         $allAppointments = User::join('appointments', 'users.id', '=', 'appointments.user_id')
            ->where('users.id', $userId)
            ->get();

        return Inertia::render('Dashboard', [
            'income' => $income,
            'allAppointments' => $allAppointments,
        ]);
    }
}
