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
        return view('back.article.index');
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
    public function store(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'slug' => 'required|string|max:255',
        'description' => 'required|string',
        'isActive' => 'required|boolean',
        'isComment' => 'required|boolean',
        'isSharable' => 'required|boolean', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|integer|exists:categories,id',
    ]);
   
    // Gestion de l'upload de l'image
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('assets', 'public');
    }
     // Création de l'article
    Articles::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'isActive' => $validated['isActive'],
        'isComment' => $validated['isComment'],
        'isSharable' => $validated['isSharable'],
        'image' => $imagePath,
        'category_id' => $validated['category_id'],
        'author_id' => Auth::id(),
    ]);

    return redirect()->route('article.index')->with('success', 'Article publié avec succès');
}

    /**
     * Display the specified resource
     */
    public function show(string $id)
    {
           
    }

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



