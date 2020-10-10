<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('posi_name')->unique()->comment('ชื่อตำแหน่ง');
            $table->text('posi_desc')->nullable()->comment('รายละเอียดเพิ่มเติม');
            $table->boolean('posi_status')->default(true)->comment('สถานะ true-ใช้งาน false-ยกเลิก');
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
        Schema::dropIfExists('positions');
    }
}
