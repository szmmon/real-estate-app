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
        'deleted' => $request->boolean('deleted'),
        ...$request->only(['by', 'order'])
    ];
        
        return inertia('Realtor/index',
        [
            'filters' => $filters,
            'listings' => FacadesAuth::user()
            ->listing()
            ->filter($filters)
            ->paginate(5)
            ->withQueryString()
        ]);
    }


    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        
        return redirect()->back()->with('success', 'Listing was deleted');
    }
}
