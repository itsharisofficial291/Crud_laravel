<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::dropIfExists('c_products');
    
    Schema::create('c_products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('description');
        $table->string('image');
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('c_products', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
    
};
