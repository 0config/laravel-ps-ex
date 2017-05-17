<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsAclsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_acls', function (Blueprint $table) {
            $table->increments('id');


            $table->unique(array('uid', 'gid'));// for unique

            // copy and paste this in your migration file..
            $table->char('name')->nullable() ;
            $table->integer('uid')->nullable() ;
            $table->integer('gid')->nullable() ;
            $table->text('comments')->nullable() ;
            $table->integer('del_stat')->nullable()->default(0) ;

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
        Schema::dropIfExists('ps_acls');
    }
}
