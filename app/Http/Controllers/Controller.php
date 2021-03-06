<?php

namespace App\Http\Controllers;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\NewProductRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\File;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    private $productRepo;
    
    public function __construct(ProductRepository $productRepo, OrderRepository $orderRepo){
        $this->productRepo = $productRepo;
        $this->orderRepo = $orderRepo;
    }

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
        // $product = Product::all();
        // // $product[10]->delete();
        // $produit = Product::where('title','iphone 10')->get();
        $product = $this->productRepo->selectWithDb();
        dump($product);
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
        $file = $r['file'];

        $extension = $file->extension();
        $time = date('U');
        $originalName = $file->getClientOriginalName();
        $name = hash('md5', $time.$originalName).".".$extension;

        $file->move('uploads',$name);


        $produit = new Product();
        $produit->title = $title;
        $produit->description = $description;
        $produit->prix = $prix;
        $produit->tva = $tva;
        $produit->picture = $name;
        $produit->reference = $reference;
        $produit->save();
        return redirect()->back()->with('message','Votre produit a était enregistré!!');
        dump($r);
        die();
    }

    public function showproduct($id){
        $product = new Product();
        $produits = Product::where('id',$id)->get();
        foreach ($produits as $p) {
            $title = $p->title;
            $description = $p->description;
            $prix = $p->prix;
            $image = $p->picture;
        }
        $tab=[
            'title' => $title,
            'description' =>$description,
            'prix' => $prix,
            'picture' => $image
        ];
           
    }

    public function session(Request $request){
        $request->session()->put('key','value');
        $request->session()->put('name','thomas');
        dump($request->session()->get('name'));
        die();
        return "ici ce sont les sessions";
    }

}

