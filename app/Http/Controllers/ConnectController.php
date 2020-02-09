<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    public function __construct() 
    {
        $this->middleware('guest')->except('getLogout');
    } # End method __construct

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
     * Valida las credenciales del usuario
     * 
     *  @author Herney Ruiz-Meza
     * 
     *  @param not
     *  @return View 
     */
    public function postLogin(LoginRequest $request)
    {
        // Verificamos las credenciales, y quitanos el token de el array request
        if ( Auth::attempt($request->except('_token'), true) ){
            
            return redirect()->route('index');

        }else{
            
            return back()->with('message_login', 'Correo o/y Contraseña incorrecta.');
        }
    } # End method postLogin

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
     * Envia los datos de regsitro al modelo User
     * 
     *  @author Herney Ruiz-Meza
     * 
     *  @param RegisterRequest $request
     *  @return View login
     */
    public function postRegister(RegisterRequest $request)
    {
        // Encripto de la contraseña
        $request['password'] = Hash::make($request['password']);

        if ( User::create($request->all()) ) {
            
            return redirect()->route('login');
        }
    } # End method postRegister

    /**
     * Cerrar la session 
     * 
     *  @author Herney Ruiz-Meza
     * 
     *  @param not
     *  @return View index
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('index');
    } # End method getLogout

} # End class ConnectController
