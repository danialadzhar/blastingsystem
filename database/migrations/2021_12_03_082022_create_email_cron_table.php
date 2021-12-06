<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailCronTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_cron', function (Blueprint $table) {
            $table->id();
            $table->string('email_id');
            $table->string('subject');
            $table->text('email_content');
            $table->string('group_id');
            $table->string('email_from');
            $table->string('name_from');
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
        Schema::dropIfExists('email_cron');
    }
}
