<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_msgs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->index()->comment('发布者');
            $table->string('title')->comment('標題');
            $table->text('content')->comment('留言内容');
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
        Schema::dropIfExists('leave_msgs');
    }
};
