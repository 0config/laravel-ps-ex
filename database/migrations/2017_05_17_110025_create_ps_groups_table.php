<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_groups', function (Blueprint $table) {
            $table->increments('id');
            // copy and paste this in your migration file..
            $table->char('name')->nullable() ;
            $table->integer('del_stat')->nullable()->default(0) ;
            $table->text('comments')->nullable() ;
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
        Schema::dropIfExists('ps_groups');
    }
}
