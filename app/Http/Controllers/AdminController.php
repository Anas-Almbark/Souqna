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
        return view("dashboardComponents.admin", compact("admins"));
    }
    public function create()
    {
        return view("dashboardComponents.addAdmin");
    }
    public function store()
    {
        $validated = request()->validate([
            "name" => "required",
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

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route("admin.index")->with("success", "Admin deleted successfully");
    }
}
