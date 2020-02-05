<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class ConnectController extends Controller
{

    /**
     * Retorna la vista principal de login
     * 
     *  @author Herney Ruiz-Meza
     * 
     *  @return view login 
     *  @param not
     */
    public function getLogin()
    {
        return view('connect.login');

    } # End method getLogin

    /**
     * Retorna la vista principal de registro
     * 
     *  @author Herney Ruiz-Meza
     * 
     *  @return view register 
     *  @param not
     */
    public function getRegister()
    {
        return view('connect.register');
    } # End method getRegister

} # End class ConnectController
