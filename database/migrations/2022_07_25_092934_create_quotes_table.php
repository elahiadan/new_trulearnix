<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->text('url')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status_id')->default(1)->comment('1 => New 2 => Junk 3 => Contacted');
            $table->timestamps();
            
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
};
