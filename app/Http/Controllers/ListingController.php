<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings/index', [
          //'listings' => Listing::all(),
        'listings' => Listing::latest()->filter(request(['tag','search']))
            ->paginate(6)
            //->Simplepaginate(6)
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
//            'company' => ['required', Rule::unique('listings', 'company')],
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();
        //$formFields
        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');
    }
    public function edit(Listing $listing)
    {
        return view('listings/edit', ['listing' => $listing]);
    }
    public function update(Request $request, Listing $listing)
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

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        //$formFields
        //Listing::create($formFields);
        $listing->update($formFields);
        return redirect('/')->with('message', 'Listing updated successfully!');
    }
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}
