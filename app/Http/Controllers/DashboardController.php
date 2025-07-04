<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Salary;
use App\Models\Company;


class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'superadmin') {
            // Data global seluruh perusahaan, user, dll
            // $companiesCount = ::count();
            // $usersCount = User::count();
            return view('home.index');
        }

        if ($user->role === 'admin') {
            // Data perusahaan milik admin
            // $company = $user->company;
            // $employeesCount = User::where('company_id', $company->id)
            //     ->where('role', 'employee')
            //     ->count();

            // dll
            return view('home.index');
        }


        if ($user->role === 'karyawan') {
            // Data personal employee
            $karyawan = $user->karyawan;
            return view('home.index', compact('karyawan'));
        }

        abort(403); // jika role tidak dikenal
    }
}
