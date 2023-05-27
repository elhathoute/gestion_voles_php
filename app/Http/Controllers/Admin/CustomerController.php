<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        $data = User::where('is_admin','!=',1)->get();

        return view('admin.customers.index', compact('data'));
    }


    public function show(Request $request, User $user)
    {
        return view('admin.customers.show', compact('user'));
    }
    public function delete(Request $request, User $user)
    {
        $user->delete();
        return redirect()->back();
    }


}
