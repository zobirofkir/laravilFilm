<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("movies.movie");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Contact();
        $data->username = $request->input("username");
        $data->email = $request->input("email");
        $data->subject = $request->input("subject");
        $data->text = $request->input("text");
        if ($data->save()){
            $compa = "We will Add This Movie Soon .";
            return view("movies.movie", compact("compa"))
            ->with('message', 'We will Add This Movie Soon .');
        }else {
            $compa = "Bad Request";
            return view("movies.movie", compact("compa"));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
