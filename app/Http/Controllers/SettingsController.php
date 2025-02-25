<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    
    public function index()
    {
        return view('back.settings.index', [
            'settings' => Settings::find(1)
        ]);
    }

    public function update(SettingsRequest $request){
        $request->validated($request->all());

        //traitement de l'upload de logo
        $logo=$request->logo;
        $settings=Settings::find(1);
        if($logo != null && !$logo->getError()){
             if($settings->logo){
                Storage::disk('public')->delete($settings->image);
             }
             $logo=$request->image->store('asset','public');
        }
          $settings->update([
            'web_site_name'=>$request->web_site_name,
            'logo'=>$logo,
            'address'=>$request->address,
            'phone'=>$request->phone,
             'email'=>$request->email,
             'about'=>$request->about

        ]);
        return back()->with('success','paramettrage modifié avec succès');
    }

}
