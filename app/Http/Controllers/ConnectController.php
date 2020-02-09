<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class ConnectController extends Controller
{

    /**
     * Retorna la vista principal de login
     * 
     *  @author Herney Ruiz-Meza
     * 
     *  @param not
     *  @return view login 
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
     *  @param RegisterRequest $request
     *  @return 
     */
    public function postRegister(RegisterRequest $request)
    {
        // Encripto de la contraseña
        $request['password'] = Hash::make($request['password']);

        if ( User::create($request->all()) ) {
            
            return redirect()->route('login');
        }
    } # End method postRegister

} # End class ConnectController
