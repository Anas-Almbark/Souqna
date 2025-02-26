<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::all();
        return view("supports.index", compact("supports"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("supports.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
        ]);
        
        if ($request->has("user_id")) {
            Support::create([
                "name" => $request->name,
                "email" => $request->email,
                "subject" => $request->subject,
                "message" => $request->message,
                "user_id" => $request->user_id,
            ]);
           

        } else {
        Support::create([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);
    }
        return redirect()->route('home.index')->with("success","Message sent successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        return view("supports.show", compact("support"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        return view("supports.edit", compact("support"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
        ]);
        Support::update([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);
        return redirect()->back()->with("success","Message updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        $support->delete();
        return redirect()->route('supports.index')->with("success","Message deleted successfully");
    }
}
