<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMediaGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_media_gallery', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable(false)->unsigned(true);
            $table->string('value', 255)->nullable(false);
            $table->string('label', 255)->nullable(true);
            $table->timestamp('created_at')->useCurrent()->nullable();
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
        Schema::dropIfExists('product_media_gallery');
    }
}
