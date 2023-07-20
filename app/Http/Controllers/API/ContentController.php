<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContentResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return response()->json(
        [
            'message' => 'content page'
        ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ['required', "string", "max:20", 'min:3'],
            "email" => ['required', 'email'],
            "phone_number" => ['nullable', 'string',],
            "message" => ['required', 'string', 'max:300'],
        ]);

       $content =  Contact::create($data);

        return response()->json([
            'message'=> 'content data sent',
            'data' => new ContentResource($content)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
