<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.social.index', 
       ['socials'=>SocialMedia::all()
       ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.social.create');
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreSocialMediaRequest $request)
    {
        $request->validated($request->all());
        SocialMedia::create($request->all());
        return redirect()->route('social.index')->with('success',' reseau ajouté avec succès'); 

    }

    /**
     * Display the specified resource.
     */
    public function edit(SocialMedia $social)
    {
          return view('back.social.create', compact('social'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(SocialMedia $socialMedia)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $social)
    {
         $request->validated($request->all());
         $social->update($request->all());
         return redirect()->route('social.index')->with('success',' reseau modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(SocialMedia $social)
    {
          $social->delete();
          return redirect()->route('social.index')->with('success','reseau supprimé avec succès '); 
    }  
}






