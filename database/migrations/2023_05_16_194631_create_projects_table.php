<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->cascadeOnDelete();

                 $table->unsignedBigInteger('client_id');
                 $table->foreign('client_id')
                      ->references('id')
                      ->on('clients')
                      ->cascadeOnDelete();

            $table->string('title');
            $table->text('description');
            $table->string('status')->default('open');
            $table->date('deadline');
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
        Schema::dropIfExists('projects');

        Schema::table('projects', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}