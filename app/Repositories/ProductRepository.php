<?php
namespace App\Repositories;
use App\Product;
use Illuminate\Support\Facades\DB;
class ProductRepository extends BaseRepository{

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }
    public function testing(){
        return "cecie est un testing";
    }
    /***Eloquent -> on utilise les classes Model/entity: Product, Order et OrderProduct */
    public function selectMyProduct($id){
        return Product::find($id);
        //Product::all();
        /**l'avantage de cette methode c'est qu'elle permets d'appeler ulterieurement les classes qui lui sont lié, par contre il faut les mettre en lien dans les modeles */
    }
    public function selectProductBetween($min,$max){
        $product = Product::whereBetween('prix',array($min,$max))
        ->take(4)
        ->orderby('prix','desc')
        ->get();
        return $product;
    }
    public function selectWithDb(){
        $products = DB::select("SELECT * FROM products WHERE prix < :prix", array('prix'=>200));
        return $products;
    }
}