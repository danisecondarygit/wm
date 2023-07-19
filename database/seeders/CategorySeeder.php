<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
             'title'=>'Computers'
            ],
            [
             'title'=>'Shoes'
            ]
        ];
        foreach($data as $d){
            Category::create($d);
        }
    }
}
