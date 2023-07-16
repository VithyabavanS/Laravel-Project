<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ListingController extends Controller
{
    // Show all Listings
    public function index(){
        return view('listings.index',[
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))
            ->paginate(6) 
        ]);
        

    }

    // Show Single Listings
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);

    }
    // Show Create Form
    public function create(){
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            // 'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            // 'website' => 'required',
            // 'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();
        $formFields['user_name'] = auth()->user()->name;

        if (Auth::user()->role == 1) {
            $formFields['approved'] = 1; // Set as approved for admin users
        } else {
            $formFields['approved'] = 0; // Mark as pending approval for regular users
        }

    
        


        Listing::create($formFields);

        

        return redirect('/')->with('message', 'Post created successfully!');

    }


    // Show Edit Form
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }


    //Update listing data
    public function update(Request $request, Listing $listing)
    {
        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            // 'company' => ['required'],
            'location' => 'required',
            // 'website' => 'required',
            // 'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        
    
        

        $listing->update($formFields);

        return back()->with('message', 'Post Updated successfully!');

    }

    //Delete Listing
    public function destroy(Listing $listing){
        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Post Deleted Successfully');
    }
    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
        
    }

    // Approve Listings
    // public function approve() {
    //     return view('listings.approve', ['listings' => auth()->user()->listings()->get()]);
    // }

    public function approve()
{
    $listings = Listing::all();

    if (Auth::user()->role == 1 || $listings->where('approved', false)->isNotEmpty()) {
        return view('listings.approve', compact('listings'));
    } else {
        return redirect()->route('home')->with('message', 'Access Denied as you are not an Admin or there are no unapproved listings!');
    }
}

    public function approved(Listing $listing)
    {
        $listing->approved = true;
        $listing->save();

        return redirect()->back()->with('success', 'Post approved successfully.');
    }

    public function rejected(Listing $listing)
    {
        $listing->delete();
        

        return redirect()->back()->with('success', 'Post rejected successfully.');
    }

  



}
