<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    /**
     * Llamamos librerias necesarias y middleware
     */
    public function __construct()
    {
        $this->middleware([
            'auth',
            'isadmin',
            'user.status'
        ]);
    } # End method __construct

    /**
     * Retorna la vista principal del dashboard
     *
     *  @author Herney
     *
     *  @return view dashboar
     */
    public function getDashboar()
    {
        return view('admin.dashboard');
    } # End method getDashboar

} # End class DashboarController
