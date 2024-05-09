<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
use Gate;
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
            ->withCount('images')
            ->paginate(5)
            ->withQueryString()
        ]);
    }


    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();
        
        return redirect()->back()->with('success', 'Listing was deleted');
    }

    
    public function create()
    {
        return inertia('Realtor/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->user()->listing()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_num' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('realtor.listing.index')->with('success', 'Listing was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia('Realtor/show',
        ['listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        Gate::authorize('update', $listing);

         return inertia(
            'Realtor/edit',
            [
                'listing' => $listing
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_num' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('realtor.listing.index')
            ->with('success', 'Listing was changed!');
    }

        public function restore(Listing $listing){
        $listing->restore();

        return redirect()->back()->with('success', 'Listing was restored!');
        }
}
