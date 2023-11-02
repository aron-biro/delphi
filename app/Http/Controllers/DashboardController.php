<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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

        $doctorCount = User::where('is_doctor', true)->count();

        //$lastMonthsEarnngs = 

        return Inertia::render('Dashboard', [
            'income' => $income,
            'appointments' => $appointments,
            'doctorCount' => $doctorCount,
            'search' => $search
        ]);
        
    }
}
