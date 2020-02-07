<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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
     *  @param not
     *  @return view register 
     */
    public function getRegister()
    {
        return view('connect.register');
    } # End method getRegister

    /**
     * Envia los datos de regsitro al modelo Connect
     * 
     *  @author Herney Ruiz-Meza
     * 
     *  @param request
     *  @return 
     */
    public function postRegister(RegisterRequest $request)
    {
        
    } # End method postRegister

} # End class ConnectController
