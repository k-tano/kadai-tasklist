<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
   public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->string('status');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id') //外部キー制約
                  ->references('id')->on('users') //ｕｓｅｒｓテーブルのidを参照する
                  ->onDelete('cascade');  //ユーザーが削除されたら紐付くpostsも削除
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
            $table->dropColomn("user_id");
    }
}