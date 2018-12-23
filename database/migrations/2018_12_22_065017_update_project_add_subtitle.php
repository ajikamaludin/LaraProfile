<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectAddSubtitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('subtitle', 255)->nullable();
            $table->string('owner', 255)->nullable();
            $table->string('tahun', 255)->nullable();
            $table->string('scope', 255)->nullable();
            $table->string('architect', 255)->nullable();
            $table->string('status_bangunan', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
