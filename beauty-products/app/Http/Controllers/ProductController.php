<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::query(); // requete de type Builder

        if ($request->has('date') && $request->input('date') == 'date') {
            $products->orderByDesc('created_at');
        } elseif ($request->has('title') && $request->input('title') == 'title') {
            $products->orderBy('title');
        }

        $products = $products->paginate(8);

        return view('dashboard', compact('products', 'categories'));
    }


    public function indexUser(Request $request)
    {
        $categories = Category::all();
        $products = Product::query(); // requete de type Builder

        if ($request->has('date') && $request->input('date') == 'date') {
            $products->orderByDesc('created_at');
        } elseif ($request->has('title') && $request->input('title') == 'title') {
            $products->orderBy('title');
        }

        $products = $products->paginate(8);

        return view('welcome', compact('products', 'categories'));
    }

//$sortedProductsTitle = $products->sortBy('title');

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'picture' => 'required'
        ]);

        $fileName = time() . $request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('picture', $fileName, 'public');
        $validatedData["picture"] = '/storage/' . $path;

        $product = new Product();
        $product->title = $validatedData['title'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category_id'];
        $product->picture = $validatedData["picture"];

        $product->save();

        return redirect()->route('dashboard',)->with('status', 'Produit ajouté avec succès');
    }


    /***
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $product = Product::find($id);
        $category = $product->category;
        return view('/description', compact('product', 'category'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('dashboard', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        if ($request->hasFile('picture')) {
            $fileName = time() . '.' . $request->file('picture')->getClientOriginalExtension();
            $request->file('picture')->storeAs('public/images', $fileName);
            $product->picture = 'storage/images/' . $fileName;
        }

        $product->save();

        return redirect()->route('dashboard')->with('success', 'Produit mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('dashboard')->with('delete', 'Produit supprimé avec succès.');
    }

    public function showProductsByCategory(Request $request)
    {
        $categoryId = $request->input('category');

        if ($categoryId == 1) {
            $categoryProducts = Product::where('category_id', 1)->paginate(8);
        } else {
            $categoryProducts = Product::where('category_id', '!=', 1)->paginate(8);
        }

        $categories = Category::all();

        return view('categories_product', compact('categoryProducts', 'categories'));
    }



}
