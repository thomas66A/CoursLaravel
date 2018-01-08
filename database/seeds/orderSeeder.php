<?php
use App\order;
use App\OrderProduct;
use Illuminate\Database\Seeder;

class orderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Order::truncate();
        OrderProduct::truncate();
        $numberOrders = $faker->numberBetween(1,11);
        

        for($i=1; $i<$numberOrders; $i++){
        $reference = $faker->randomLetter.$faker->randomNumber(5);
        $date = $faker->dateTimeBetween('-30 days', '-1 days');
        $dateup = $faker->dateTimeBetween('-1 days', 'now');
        
        Order::create(array(
            'reference'=>$reference,
            'created_at'=>$date,
            'updated_at'=>$dateup,
        ));
    
        $numberProducts = $faker->numberBetween(1,3);
        
        for($y=0; $y<$numberProducts; $y++){
            $productId=$faker->numberBetween(1,30);
            $quantity = $faker->numberBetween(1,10);
            OrderProduct::create(array(
                'order_id'=>$i,
                'product_id'=>$productId,
                'quantity'=>$quantity,
                'created_at'=>$date,
                'updated_at'=>$dateup,
            ));
        
        }
    }
    }
}
