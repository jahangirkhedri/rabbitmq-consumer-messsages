<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_logs', function (Blueprint $table) {
            $table->id();
            $table->string('to_user');
            $table->string('type');
            $table->string('name')->nullable();
            $table->longText('message');
            $table->tinyInteger('success');
            $table->timestamp('sent');
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
        Schema::dropIfExists('messages_logs');
    }
}
