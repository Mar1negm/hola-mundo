<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HolaMundoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Send the message "Hola mundo" to the view
        return view('hola', [
            'message' => 'Hola mundo',
        ]);
    }
}
