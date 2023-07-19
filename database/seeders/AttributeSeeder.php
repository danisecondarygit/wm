<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttributeGroup;

class AttributeSeeder extends Seeder
{
    public function run()
    {
     $data = [
      ['title'=>'Shoe size', 'display_text'=>'Size', 'display_type'=>1, 'categories'=>[2], 'attributes'=>[
        ['title'=>'Small', 'display_text'=>'sm', ],
        ['title'=>'Large', 'display_text'=>'lg'],
      ]],
      [
        'title'=>'Shoe color', 'display_text'=>'Color', 'display_type'=>2, 'categories'=>[2], 'attributes'=>[
         ['title'=>'Blue', 'display_text'=>'blue'],
         ['title'=>'Black', 'display_text'=>'black']
        ]
        ],
       [
        'title'=>'Computer processor', 'display_text'=>'Processor', 'display_type'=>1, 'categories'=>[1], 'attributes'=>[
         ['title'=>'Intel core i5', 'display_text'=>'intel core i5'],
         ['title'=>'Intel core i7', 'display_text'=>'intel core i7']
        ] 
        ],
        [
            'title'=>'Computer graphic card', 'display_text'=>'Graphic card', 'display_type'=>1, 'categories'=>[1], 'attributes'=>[
                ['title'=>'Nvidia rtx 1050', 'display_text'=>'nvidia rtx 1050'],
                ['title'=>'Nvidia gtx 700', 'display_text'=>'nvidia gtx 700']
            ]
        ]
     ]; 
     foreach($data as $d){
       $categories = $d['categories'];
       $attributes = $d['attributes'];
       unset($d['categories']);
       unset($d['attributes']);
       $ag = AttributeGroup::create($d);
       $ag->categories()->attach($categories);
       foreach($attributes as $atdata){
        $ag->attributes()->create($atdata);
       }
     }  
    }
}
