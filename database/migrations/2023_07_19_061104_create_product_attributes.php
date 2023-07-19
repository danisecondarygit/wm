<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            foreach(['product_id'=>'products', 'attribute_id'=>'attributes'] as $foreign_key=>$local_table)
            {  
               $table->unsignedBigInteger($foreign_key); 
               $table->foreign($foreign_key)->references('id')->on($local_table)
                ->onDelete('cascade')->onUpdate('cascade'); 
            }
            $table->unique(['product_id', 'attribute_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
};
