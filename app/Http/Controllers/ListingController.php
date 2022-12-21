<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings/index', [
            //'listings' => Listing::all(),
        'listings' => Listing::latest()->filter(request(['tag','search']))
            ->get()
        ]);
    }
    public function show(Listing $listing)
    {
        return view('listings/show', [
            'listing' => $listing
        ]);
    }
    public function create()
    {
        return view('listings/create', []);
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
