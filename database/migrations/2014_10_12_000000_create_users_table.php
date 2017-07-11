<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fn_users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('idcard');
            $table->string('bank');
            $table->string('kaihuhang');
            $table->string('bankcard');
            $table->string('tel');
            $table->string('openid')->unique();
            $table->string('account');
            $table->string('code');
            $table->string('belong_name');
            $table->string('wechatid');
            $table->string('password');


            $table->integer('jifen')->default(0);
            $table->integer('money')->default(0);
            $table->integer('danshu')->default(0);
            $table->rememberToken()->nullabel();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
