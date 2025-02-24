<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view("dashboardComponents.admins", compact("admins"));
    }
    public function create()
    {
        return view("dashboardComponents.addAdmin");
    }
    public function store()
    {
        $validated = request()->validate([
            "name" => "required|min:3|max:255",
            "email" => "required|email|unique:admins,email",
            "password" => "required|min:8",
            "role" => "required"
        ]);
        $admin = new Admin();
        $admin->name = $validated["name"];
        $admin->email = $validated["email"];
        $admin->password = Hash::make($validated["password"]);
        $admin->role = $validated["role"];
        $admin->save();

        return redirect()->route("admin.index")->with("success", "Admin added successfully");
    }

    public function destroy(Admin $id)
    {
        $id->delete();
        return redirect()->route("admin.index")->with("success", "Admin deleted successfully");
    }

    public function edit(Admin $admin)
    {
        return view("dashboardComponents.editAdmin", compact("admin"));
    }
    public function update(Admin $admin)
    {
        $validated = request()->validate([
            "name" => "required|string|min:3|max:255",
        ]);

        $admin->name = $validated["name"];
        $admin->update();
        return redirect()->route("admin.index")->with("success", "Admin name updated successfully");
    }
    public function updatePassword(Admin $admin)
    {
        $validated = request()->validate([
            "password" => "required|min:8",
            "password_confirmation" => "required|min:8|same:password",
        ]);
        $admin->password = Hash::make($validated["password"]);
        $admin->update();
        return redirect()->route("admin.index")->with("success", "Password updated successfully");
    }
}
