<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

         $user= Auth::user();
         if($user->role=='author')
         {
             $author_articles= Articles::where('author_id',$user->id)->count();
         }

         $artilces= Articles::all();
         $recent_articles= Articles::where('isActive',1)->orderBy('created_at','desc')->take(10)->get();
         $categories = category::count();


        return view('back.dashboard',
        [
                'author_articles'=>$user->role =='author'? $author_articles:null,
                'articles'=>$artilces, 
                'recent_articles'=>$recent_articles,
                'categories'=>$categories
        ]

    );
    }
}

