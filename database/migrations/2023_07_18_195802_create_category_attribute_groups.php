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
        Schema::create('category_attribute_groups', function (Blueprint $table) {
            $table->id();
            foreach(['category_id', 'attribute_group_id'] as $field){
                $table->unsignedBigInteger($field);
            }
            foreach(['category_id'=>'categories', 'attribute_group_id'=>'attribute_groups'] as $foreign_key=>$referenced_table){
                $table->foreign($foreign_key)->references('id')->on($referenced_table)
                 ->onDelete('cascade')->onUpdate('cascade');
            }
            $table->unique(['category_id', 'attribute_group_id']);
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
        Schema::dropIfExists('category_attribute_groups');
    }
};
