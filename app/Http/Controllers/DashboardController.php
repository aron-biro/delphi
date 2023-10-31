<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;
        

        $income = User::join('appointments', 'users.id', '=', 'appointments.user_id')
        ->join('services', 'appointments.service_id', '=', 'services.id')
        ->where('users.id', $user)
        ->select(
            'services.title as service_name',
            \DB::raw('SUM(services.price) as total_income'),
            \DB::raw('COUNT(appointments.id) as total_appointments')
        )
        ->groupBy('services.title')
        ->paginate(10);

        $appointments = User::join('appointments', 'users.id', '=', 'appointments.user_id')
            ->join('services', 'appointments.service_id', '=', 'services.id')
            ->where('services.user_id', $user)
            ->select(
                'users.name as user_name',
                'services.title as service_name',
                'appointments.reserved_at as appointment_date'
            )
            ->get();

        // $appointmentsByMonth = User::join('appointments', 'users.id', '=', 'appointments.user_id')
        //     ->where('users.id', $user)
        //     ->where('appointments.reserved_at', '>=', Carbon::now()->subMonths(12))
        //     ->select(
        //         \DB::raw('YEAR(appointments.reserved_at) as year'),
        //         \DB::raw('MONTH(appointments.reserved_at) as month'),
        //         \DB::raw('COUNT(*) as total')
        //     )
        //     ->groupBy(\DB::raw('YEAR(appointments.reserved_at)'), \DB::raw('MONTH(appointments.reserved_at)'))
        //     ->get();

        $appointmentsByDayLast30Days = User::join('appointments', 'users.id', '=', 'appointments.user_id')
            ->where('users.id', $user)
            ->where('appointments.reserved_at', '>=', Carbon::now()->subDays(30))
            ->select(
                \DB::raw('DATE(appointments.reserved_at) as day'),
                \DB::raw('COUNT(*) as total')
            )
            ->groupBy('day')
            ->get();

        $formattedAppointmentsByDayLast30Days = [];
        foreach ($appointmentsByDayLast30Days as $appointment) {
            $formattedAppointmentsByDayLast30Days[Carbon::parse($appointment->day)->toDateString()] = $appointment->total;
        }

        // $appointmentsByHourLast24Hours = User::join('appointments', 'users.id', '=', 'appointments.user_id')
        //     ->where('users.id', $user)
        //     ->where('appointments.reserved_at', '>=', Carbon::now()->subHours(24))
        //     ->select(
        //         \DB::raw('HOUR(appointments.reserved_at) as hour'),
        //         \DB::raw('COUNT(*) as total')
        //     )
        //     ->groupBy('hour')
        //     ->get();
        
        // $formattedAppointmentsByHourLast24Hours = [];
        // foreach ($appointmentsByHourLast24Hours as $appointment) {
        //     $formattedAppointmentsByHourLast24Hours[$appointment->hour] = $appointment->total;
        // }

        $doctorCount = User::where('is_doctor', true)->count();

        return Inertia::render('Dashboard', [
            'income' => $income,
            'appointments' => $appointments,
            'doctorCount' => $doctorCount,
            // 'appointmentsByMonth' => $appointmentsByMonth,
            'formattedAppointmentsByDayLast30Days' => $formattedAppointmentsByDayLast30Days,
            // 'formattedAppointmentsByHourLast24Hours' => $formattedAppointmentsByHourLast24Hours
        ]);
        
    }
}
