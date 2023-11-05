<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Appointments;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user()->id;
        $search = $request->query->get('search', '');

        $income = User::join('appointments', 'users.id', '=', 'appointments.user_id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->where([
                    ['users.id', $user],
                    ['services.title', 'ILIKE', "%$search%"]
            ])
            ->select(
                'services.title as service_name',
                \DB::raw('SUM(services.price) as total_income'),
                \DB::raw('COUNT(appointments.id) as total_appointments')
            )
            ->groupBy('services.title')->paginate(10);

        $appointments = User::join('appointments', 'users.id', '=', 'appointments.user_id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->where('services.user_id', $user)
            ->select(
                'users.name as user_name',
                'services.title as service_name',
                'appointments.reserved_at as appointment_date'
            )
            ->get();

        $currentMonthTotalIncome = Appointments::join('services', 'appointments.service_id','=', 'services.id')
            ->where('appointments.reserved_at', '>=', Carbon::now()->startOfMonth())
            ->sum('services.price');
        
        $lastMonthTotalIncome = Appointments::join('services', 'appointments.service_id','=', 'services.id')
            ->where('appointments.reserved_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('appointments.reserved_at', '<', Carbon::now()->startOfMonth())
            ->sum('services.price');

        $lastMonthAppointmentCount = Appointments::where('reserved_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('reserved_at', '<', Carbon::now()->startOfMonth())
            ->count();

        $currentMonthAppointmentCount = Appointments::where('reserved_at', '>=', Carbon::now()->startOfMonth())
            ->count();

        $lastMonthUserCount = Appointments::where('reserved_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            ->where('reserved_at', '<', Carbon::now()->startOfMonth())
            ->distinct('user_id')
            ->count('user_id');

        $currentMonthUserCount = Appointments::where('reserved_at', '>=', Carbon::now()->startOfMonth())
            ->distinct('user_id')
            ->count('user_id');

        $doctorCount = User::where('is_doctor', true)->count();

        $upcomingAppointment = Appointments::join('users', 'appointments.user_id', '=', 'users.id')
        ->join('services', 'appointments.service_id', '=', 'services.id')
        ->select('appointments.reserved_at as appointment_date', 'users.name as user_name', 'services.title as service_name', 'services.duration as service_duration')
        ->where('appointments.reserved_at', '>', Carbon::now())
        ->orderBy('appointments.reserved_at', 'asc')
        ->first();

        return Inertia::render('Dashboard', [
            'income' => $income,
            'appointments' => $appointments,
            'doctorCount' => $doctorCount,
            'search' => $search,
            'currentMonthTotalIncome' => $currentMonthTotalIncome,
            'lastMonthTotalIncome' => $lastMonthTotalIncome,
            'lastMonthAppointmentCount' => $lastMonthAppointmentCount,
            'currentMonthAppointmentCount' => $currentMonthAppointmentCount,
            'lastMonthUserCount' => $lastMonthUserCount,
            'currentMonthUserCount' => $currentMonthUserCount,
            'upcomingAppointment' => $upcomingAppointment
        ]);
        
    }
}
