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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('level')->nullable();
            $table->string('language')->nullable();
            $table->string('mode_of_class')->nullable();
            $table->integer('price')->default(0);
            $table->string('discount_type')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('actual_price')->default(0);
            $table->integer('commission')->default(0);
            $table->string('commission_type')->nullable();
            $table->integer('total_commission')->default(0);
            $table->string('currency')->nullable();
            $table->longText('content')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->text('specification')->nullable();
            $table->tinyInteger('status')->nullable()->unsigned()->comment('1 => Active 2 => InActive');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
