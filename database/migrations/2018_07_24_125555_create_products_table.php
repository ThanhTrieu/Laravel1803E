<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // cho phep tao khoa ngoai o bang nay
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('catid')->unsigned();
            $table->integer('sizeid')->unsigned();
            $table->string('name',180);
            $table->text('image');
            $table->float('price',8,2);
            $table->float('sale')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('qty');
            $table->text('description');
            $table->timestamps();

            // lien ket khoa ngoai toi cac bang khac
            $table->foreign('catid')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sizeid')->references('id')->on('sizes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
}
