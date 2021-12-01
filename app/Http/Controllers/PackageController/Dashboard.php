<?php

namespace App\Http\Controllers\PackageController;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $packages = Package::get();
        return view('admin.package.dashboard',['packages'=>$packages]);
    }

}