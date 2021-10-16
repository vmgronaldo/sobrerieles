<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("trainer_id");
            $table->string("curso")->unique();
            $table->bigInteger("time")->nullable();
            $table->string("extension")->nullable();
            $table->boolean("status")->default(1);
            $table->foreign("category_id")
                ->on("categories")
                ->references("id");
            $table->foreign("trainer_id")
                ->on("trainers")
                ->references("id");
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
        Schema::dropIfExists('courses');
    }
}
