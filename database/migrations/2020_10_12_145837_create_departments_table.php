<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('depart_name')->unique();
            $table->text('depart_desc')->nullable();
            $table->boolean('depart_status')->deafult(true);
            $table->unsignedBigInteger('ref_id')->nullable();

            $table->foreign('ref_id')->references('id')->on('departments')->onDelete('SET NULL');
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
        Schema::table('departments',function(Blueprint $table){
            $table->dropForeign('departments_ref_id_foreign');
        });
        Schema::dropIfExists('departments');
    }
}
