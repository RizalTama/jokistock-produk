<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function index()
    {
        $adminId = session('admin_id');
        $dataAdmin = Admin::find($adminId);
        return view('admin.profile.profilAdmin', compact('adminId', 'dataAdmin'));
    }
}
