<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PharIo\Manifest\Author;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
               
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            
        }

           //vérifions si l'utilisateur a uploader une image 

          if($request->hasFile('image')){
            //suppression de l'image si elle existait déjà ensuite vérifier si l'image n'est pas vide 
            if(file_exists(public_path('back_auth/asset/profiles'.$request->user()->image)) and !empty($request->user()->image)){
                unlink(public_path('back_auth/asset/profiles'.$request->user()->image));
             }
             }

             //Récuperation de l'image

             $ext=$request->file('image')->extension();
             $file_name=date('YmdHis').'.'.$ext;  
             $request->file('image')->move(public_path('back_auth/asset/profiles'));          
             $request->user()->image=$file_name;
             $request->user()->name=$request->name;
             $request->user()->image=$request->email;
            $request->user()->save(); 
            return Redirect::route('profile.edit')->with('status', 'profil modifié avec succès ');

         } 


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to ('/');
    }
}
