<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->increments('imid');
            $table->string('url',2000);
            $table->integer('eid')->nullable();
            $table->integer('nid')->nullable();
            $table->integer('pid')->nullable();
            $table->integer('uid')->nullable();
            $table->timestamps();
        });


        Schema::create('events', function (Blueprint $table) {
            $table->increments('eid');
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
        });


        Schema::create('news', function (Blueprint $table) {
            $table->increments('nid');
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
        });

        Schema::create('foundations', function (Blueprint $table) {
            $table->increments('fid');
            $table->string('name');
            $table->string('desc');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
    }
}
