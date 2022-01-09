<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type',30);
            $table->string('title',40);
            $table->string('converse',30);
            $table->string('nickname',30);
            $table->string('address');
            $table->string('status',30)->default('active'); // active,pending,blocked
            $table->string('zip_code');
            $table->string('area');
            $table->string('country',40);
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('role',55)->default('customer');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
    }
}
