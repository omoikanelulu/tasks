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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('ユーザのID');
            $table->string('title')->comment('タスクのタイトル');
            $table->string('description')->comment('タスクの説明');
            $table->date('registration_date')->comment('登録日');
            $table->date('expiration_date')->comment('期限日');
            $table->date('completion_date')->nullable()->comment('完了日（未完了時はnull）');
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
        Schema::dropIfExists('tasks');
    }
};
