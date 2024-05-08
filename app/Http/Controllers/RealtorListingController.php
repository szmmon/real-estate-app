<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RealtorListingController extends Controller
{
    public function index(){
        return inertia('Realtor/index',
        ['listings' => FacadesAuth::user()->listing]);
    }
}
