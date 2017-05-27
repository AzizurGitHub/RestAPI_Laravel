<?php

use App\Category;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');


        $table = [
            'users',
            'categories',
            'products',
            'transactions',
            'category_product'
        ];

        foreach ($table as $item) {
            DB::table($item)->truncate();
        }



        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        factory(User::class,200)->create();
        factory(\App\Category::class,30)->create();
        factory(\App\Product::class,1000)->create()->each(function ($product){
            $categories = Category::all()->random(mt_rand(1,5))->pluck('id');
            $product->categories()->attach($categories);
        });

        factory(\App\Transaction::class,1000)->create();


    }
}
