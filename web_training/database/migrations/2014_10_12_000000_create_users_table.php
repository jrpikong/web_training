<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nic_name');
            $table->string('birth_date');
            $table->string('province_of_birth');
            $table->string('place_of_birth');
            $table->string('gender');
            $table->string('province');
            $table->string('city');
            $table->string('districts');
            $table->string('postal_code');
            $table->text('address');
            $table->string('phone_number');
            $table->string('university');
            $table->string('id_identity');
            $table->string('id_university');
            $table->string('grade_point_average');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default(0);
            $table->string('grade_test')->nullable();
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
