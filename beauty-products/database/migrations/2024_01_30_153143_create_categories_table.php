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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->timestamps();
        });

        $categories = [
            [
                "category" => "Electronics"
            ],
            [
                "category" => "Fashion"
            ],
            [
                "category" => "Office equipment"
            ],
            [
                "category" => "Furniture"
            ],
            [
                "category" => "House appliances"
            ],
            [
                "category" => "Sports and fitness"
            ],
            [
                "category" => "Auto and Parts"
            ]
        ];

        DB::table("categories")->insert($categories);
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
