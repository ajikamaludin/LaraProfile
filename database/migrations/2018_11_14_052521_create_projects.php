<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slide', 255);
            $table->text('description');
            $table->integer('id_category');
            $table->boolean('status');
            $table->text('slug');

            //penting ngak ? ngak penting
            $table->string('tahun_perancangan', 100)->nullable();
            $table->string('tahun_pembangunan', 100)->nullable();
            $table->string('luas_tanah', 100)->nullable();
            $table->string('luas_bangunan', 100)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
