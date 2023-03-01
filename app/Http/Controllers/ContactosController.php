<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request ->validate([
                'name' => ['required'],
                'email' => ['required', 'string', 'email', 'max:225', 'indisponsable'],
                'phone' => ['required','integer'],
                'message' => ['required'],
        ]);

        $contacto = Contactos::create([
            'name' => $request ['name'],
            'email' => $request ['email'],
            'phone' => $request ['phone'],
            'message' => $request ['message'],
        ]);

        $details = [
            'title' => 'New contact: ' . $contacto->name,
            'body' => 'Email: ' . $contacto->email,
            'body1' => 'Phone: ' . $contacto->phone,
            'body2' => 'Message: ' . $contacto->message,
        ];
        \Mail::to('vannej321@gmail.com')->send(new \App\Mail\SendPost($details));

        return response()->json([
            'mensaje' => 'Se agrego correctamente el Contacto',
            'data' => $contacto,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function show(Contactos $contactos)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function edit(Contactos $contactos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactos $contactos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactos $contactos)
    {
        //
    }
}
