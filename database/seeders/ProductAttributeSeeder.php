<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [1, 5], 
            [1, 7],
            [2, 6],
            [2, 8],
            [3, 1],
            [3, 3],
            [4, 2],
            [4, 4]
        ];
        foreach($data as $d){
            ProductAttribute::create([
                'product_id'=>$d[0], 'attribute_id'=>$d[1], 
            ]);
        }
    }
}
