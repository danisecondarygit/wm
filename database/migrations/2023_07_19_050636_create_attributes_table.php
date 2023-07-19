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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            foreach(['title', 'display_text'] as $field){
              $table->string($field);  
            }
            $table->unsignedBigInteger('attribute_group_id');
            $table->foreign('attribute_group_id')->references('id')->on('attribute_groups')
             ->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes(); 
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
        Schema::dropIfExists('attributes');
    }
};
