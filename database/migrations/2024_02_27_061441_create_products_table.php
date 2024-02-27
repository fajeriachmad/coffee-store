<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->text('desc');
            $table->integer('price');
            $table->string('create_by')->default('user');
            $table->timestamp('create_at');
            $table->string('modified_by')->default('user');
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
        Schema::dropIfExists('products');
    }
}

//  Tinker data add

// App\Models\Product::create([
//     'name' => 'Piccolo Latte',
//     'desc' => 'Usage of the Internet is becoming more common due to rapid advance.',
//     'price' => 49,
// ])