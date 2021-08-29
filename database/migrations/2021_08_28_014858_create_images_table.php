<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('images');
    }
}
