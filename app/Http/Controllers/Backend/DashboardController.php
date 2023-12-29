<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __consturct() {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $doctors = Doctor::whereNotNull('approve_at')->count();
        $patient = Patient::count();
        return view( 'backend.dashboard.index',compact('doctors','patient'));
    }

}
