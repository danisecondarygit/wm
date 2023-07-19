<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $data = [
        ['title'=>'Computer 1', 'price'=>5000000, 'category_id'=>1, 'description'=>'This is computer 1 description'],
        ['title'=>'Computer 2', 'price'=>4000000, 'category_id'=>1, 'description'=>'This is computer 2 description', ],
        ['title'=>'Shoe 1', 'price'=>100000, 'category_id'=>2, 'description'=>'This is shoe 1 description'],
        ['title'=>'Shoe 2', 'price'=>50000, 'category_id'=>2, 'description'=>'This is shoe 2 description'],
     ];        
     foreach($data as $d){
      Product::create($d);
     }
    }
}
