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
            $table->id();
          /*   $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); //foreig nkey will be bigint type
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete(); */

 /*         $table->unsignedBigInteger('client_id');
        $table->foreign('client_id')
                ->references('id')
                   ->on('clients')
                   ->cascadeOnDelete(); */

           $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')
               ->references('id')
               ->on('users')
               ->cascadeOnDelete();

            /*    $table->unsignedBigInteger('client_id');
               $table->foreign('client_id')
                       ->references('id')
                          ->on('clients')
                          ->cascadeOnDelete(); */

           /*     $table->unsignedBigInteger('client_id')->unsigned();
               $table->foreign('client_id')
                ->references('id')
                   ->on('clients')
                   ->cascadeOnDelete();
 */
            $table->string('title');
            $table->text('description');
            $table->string('status')->default('open');
            $table->date('deadline');
            $table->timestamps();
            $table->softDeletes();

  /*           $table->unsignedBigInteger('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('client_id')->index()->unsigned();
            $table->foreign('client_id')->references('id')->on('clients'); */

       /*       $table->foreign('client_id')->references('id')->on('clinets');  */

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
    }
}
