<?php
namespace App\Http\Controllers\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\article\SoreArticleRequest;
use App\Models\Articles;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.article.index',
    [
         'articles'=>Articles::all()
    ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create',['categories'=>category::where('isActive',1)->get()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
{
    
    $request->validated($request->all());
        // Traitement de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Stocke l'image dans le dossier `storage/app/public/images`
            $imagePath = 'storage/images/' . $imageName;
        } else {
            $imagePath = null;
        }
    

    Articles::create([
        'title'=>$request->title,
        'description'=>$request->description,
        'isActive'=>$request->isActive,
        'isComment'=>$request->isComment,
         'isSharable'=>$request->isSharable,
         'category_id'=>$request->category_id,
          'author_id'=>Auth::user()->id,
          'image' => $imagePath, // Enregistre le chemin de l'image
    ]);
    return redirect()->route('article.index')->with('success', 'Article créé avec succès.');
  
    


}

    /**
     * Display the specified resource
     */
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            
    
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    
}



