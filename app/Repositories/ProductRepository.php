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
    public function updateWithDB(){
        return DB::update("UPDATE products SET title=:title WHERE id=:id",array(
            'title'=>'testing',
            'id'=>1
        ));
    }
    public function insertWithDB(){
        return DB::insert('INSERT INTO categories SET category=:category', array(
        'category'=>'toto'
        ));
    }
    public function deleteWithDB(){
        return DB::delete('DELETE FROM categories WHERE category=:category',array(
            'category'=>"toto"
        ));
    }
    public function statementWithDB(){
        //pour des statement typiques de mysql que vous passeriez dans mysqlWorkBench par exemple
        DB::statement('ALTER TABLE products AUTO_INCREMENT=1');
        DB::raw('SELECT * product WHERE id=1');
    }
    /*** QueryBuilder -> typiquement quand il faut faire des jointures ou alors parceque les entités prennent trop de ressources ***/
    public function queryBuilderQuery(){
        /***
         * Avec le queryBuilder nous n'avons besoin d'écrire la requête entièrement. Commence toujours par DB::table('...
         ***/
        //return DB::table('products')->get();
        /*** JOINTURE ***/
        $products = DB::table('products')
            ->leftJoin('categories','products.category_id','=','categories.id')
            ->select('products.*','categories.category')
            ->get();
        return $products;
    }
    
    /***
     * TRANSACTION: Pour préserver la cohérence des bases de données certaines opérations implique plusieurs opérations d'écritures. Ce qui veut dire que pour que la base soit cohérente si une des opérations échouent les autres doivent être annulées.
     * Pour celà SQL gère les transactions à travers du statement "start TRANSACTION"
     *      1- INSERT...
     *      2- UPDATE ...
     *     Si le 1 et le 2 sont vérifiés alors on confimera avec le statement SQL
     *          "commit"
     *      Sinon avec le statement SQL
     *          "rollback"
     ***/
    public function transaction(){
        DB::transaction(function(){
           //Ici vous devez mettre vos requêtes
            // Si jamais vous devez faire plusieurs écritures pour une même opération il faut utiliser une transaction.
        });
    }

}