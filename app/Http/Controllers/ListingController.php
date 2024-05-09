<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']);
        
        return inertia('Listing/index',
        [
            'filters' => $filters,
            'listings' => Listing::latest()->filter($filters)->withoutSold()->paginate(10)->withQueryString()]);
    }    
    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $listing->load(['images']);
        $offer = !Auth::user() ?
            null : $listing->offers()->byMe()->first();
        return inertia('Listing/show',
        ['listing' => $listing,
        'offerMade' => $offer]);
    }
}
