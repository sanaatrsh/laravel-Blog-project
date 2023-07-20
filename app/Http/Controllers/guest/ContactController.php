<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guest.pages.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1 - validation
        $data = $request->validate([
            "name" => ['required', "string", "max:20", 'min:3'],
            // "name" => 'required|string|max:20|min:3',

            "email" => ['required', 'email'],
            "phone_number" => ['nullable', 'string',],
            "message" => ['required', 'string', 'max:300'],
        ]);

        //2- store


        // $contact = new Contact;

        // $contact->name = $request->name;
        // $contact->email = $request->email;
        // $contact->phone_number = $request->phone_number;
        // $contact->message = $request->message;

        // $contact->save();


        // Contact::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone_number' => $request->phone_number,
        //     'message' => $request->message,
        // ]);

        Contact::create($data);

        //3- return interface
        return redirect('/contact');
        return redirect()->back();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
