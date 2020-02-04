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
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->string('approved_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });


        Schema::create('events', function (Blueprint $table) {
            $table->increments('eid');
            $table->string('name');
            $table->string('location');
            $table->timestamp('date');
            $table->string('desc');
            $table->string('type');
            $table->string('paymenturl')->nullable();
            $table->string('rsvpurl')->nullable();
            $table->string('image',2000);
            $table->timestamps();
        });


        Schema::create('news', function (Blueprint $table) {
            $table->increments('nid');
            $table->string('name');
            $table->string('desc');
            $table->string('image',2000);
            $table->string('image2',2000);
            $table->timestamps();
        });

        Schema::create('foundations', function (Blueprint $table) {
            $table->increments('fid');
            $table->string('name');
            $table->string('desc');
            $table->string('paymenturl');
            $table->string('image',2000);
            $table->timestamps();
        });

        Schema::create('privileges', function (Blueprint $table) {
            $table->increments('pid');
            $table->string('name');
            $table->string('desc');
            $table->string('code');
            $table->string('type');
            $table->string('image',2000);
            $table->timestamps();
        });


        Schema::create('gallery', function (Blueprint $table) {
            $table->increments('gid');
            $table->string('name');
            $table->string('desc');
            $table->string('image',2000);
            $table->string('image2',2000);
            $table->string('image3',2000);
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
        Schema::dropIfExists('images');
        Schema::dropIfExists('events');
        Schema::dropIfExists('news');
        Schema::dropIfExists('foundations');
        Schema::dropIfExists('privileges');
        Schema::dropIfExists('gallery');
    }
}
