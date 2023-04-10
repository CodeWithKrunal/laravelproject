<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;



class listinController extends Controller
{
    //All Listing
    public function index(){
        //dd($request['tags']);
       // dd(request(['search']));
        return view('listings.index',[
            //'heading' => 'Krunal Latest News',
            // 'listings' => Listing::all()
            //'listings' => Listing::latest()->filter(request(['tags','search']))->get() ,
            'listings' => Listing::latest()->filter(request(['tags','search']))->paginate(6)

            // php artisan
        ]);
    }
    public function indexLisitng(){
        return view('listings.listings',[
            'heading' => 'Krunal Latest News',
            'listings' => Listing::all()
        ]);
    }


    //Single Listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing'=> $listing
        ]);
    }
    public function showLisitng(Listing $listing){
        return view('listings.listing', [
            'listing'=> $listing
        ]);
    }


    //Create Listing
    public function create(){
        return view('listings.create');
    }

    //Store or insert listing
    public function store(Request $request){

            $formFields = $request->validate([
                'company' => ['required', Rule::unique('listings', 'company')],
                'title' => 'required',
                'location' => 'required',
                'email' => ['required','email'],
                'website' => 'required',
                'tags' => 'required',
                'description' => 'required'
            ]);

            if($request->hasFile('logo')){
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }
            $formFields['user_id'] = auth()->id();
            Listing::create($formFields);
            Session::flash('message', 'Listing message successfuly');
            return redirect('/')->with('message','Listing Created Successfully');
    }


    // update listing
//     public function edit(Request $request,Listing $listing){

//         //dd($request->all());
//         $formFields = $request->validate([
//             'company' => ['required', Rule::unique('listings', 'company')],
//             'title' => 'required',
//             'location' => 'required',
//             'email' => ['required','email'],
//             'website' => 'required',
//             'tags' => 'required',
//             'description' => 'required'
//         ]);

//         if($request->hasFile('logo')){
//             $formFields['logo'] = $request->file('logo')->store('logos', 'public');
//         }
//         Listing::create($formFields);
//         Session::flash('message', 'Listing message successfuly');
//         return redirect('/')->with('message','Listing Created Successfully');
// }

public function edit(Listing $listing){
    return view('Listings.edit',['listing' => $listing]);
}

public function update(Request $request, Listing $listing){

    //dd($request->all());
    $formFields = $request->validate([
        'company' => ['required'],
        'title' => 'required',
        'location' => 'required',
        'email' => ['required','email'],
        'website' => 'required',
        'tags' => 'required',
        'description' => 'required'
    ]);

    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $listing->update($formFields);
    Session::flash('message', 'Listing message successfuly');
    return redirect('listing/manage')->with('message','Listing Update Successfuly');
    //return back()->with('message','Listing Updated Successfully');
}

public function destroy(Listing $listing){
    //dd($listing);
    $listing->delete();
    return back()->with('message','Listing Deleted Successfully');
    // return redirect('/')->with('message','Listing Deleted Successfully');
}

public function manage(){
    return view('listings.manage',['listings'=> auth()->user()->listing()->get()]);
}

}
