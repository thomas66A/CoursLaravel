<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewProductRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function accueil(){
        return view('index');
    }
    public function cart(){
        return view('cart');
    }
    public function checkout(){
        return view('checkout');
    }
    public function shop(){
        return view('shop');
    }
    public function singleproduct(){
        return view('single-product');
    }
        /* CREATE */
    public function crud(){
        $product = new Product();
        $product->title = "Iphone 10";
        $product->description = "Super téléphone, et encore trop cher pour moi.";
        $product->prix = "1080";
        $product->tva = "0.2";
        $product->reference = "Trop trop cher";
        $product->stock = 10;
        $product->save();

        /***    SELECT (read) find recherche par defaut l'ID ****/
        $product = Product::find(12);

        /*** UPDATE ***/
        $product = Product::find(12);
        $product->title = "Huawei";
        $product->prix = "680";
        $product->save();

        /***  DELETE ***/
        $product = Product::find(12);
        //$product->delete();

        //dump($product);
        // die("Page crud");
    }
    public function crudCategory(){
        $category = new Category();
        $category->category="telephone";
        $category->save();
        $category = Category::find(9);
        $category->category = "juju";
        $category->save();
        $category = Category::find(8);
        $category->delete();
        dump($category);
    }
    public function queriesDatabase(){
        $product = Product::all();
        // $product[10]->delete();
        $produit = Product::where('title','iphone 10')->get();
        dump($produit);// recherche du nom du product en particulier[11]->title
        die();
    }
    public function newProduct(){
        return view('newProduct');
    }
    public function newProductService(NewProductRequest $request){
        $r = $request->all();
        $title = $r['title'];
        $description = $r['description'];
        $prix = $r['prix'];
        $tva = $r['tva'];
        $reference = $r['reference'];

        $produit = new Product();
        $produit->title = $title;
        $produit->description = $description;
        $produit->prix = $prix;
        $produit->tva = $tva;
        $produit->reference = $reference;
        $produit->save();
        return redirect()->back()->with('message','Votre produit a était enregistré!!');
        dump($r);
        die();
    }

}

