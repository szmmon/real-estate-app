<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RealtorListingController extends Controller
{

    public function index(Request $request){
        $filters = [
        'deleted' => $request->boolean('deleted')
    ];
        
        return inertia('Realtor/index',
        ['listings' => FacadesAuth::user()
        ->listing()
        ->latest()
        ->filter($filters)
        ->get()
        ]);
    }


    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        
        return redirect()->back()->with('success', 'Listing was deleted');
    }
}
