<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $model = 'User';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->String('phone_number')->unique();
            $table->date('date_of_birth')->format('Y-m-d');
            $table->foreignId('country_id');
            $table->foreignId('governorate_id');
            $table->foreignId('district_id');
            $table->foreignId('city_id');
            $table->string('school')->default("0");
            $table->unsignedBigInteger('nationality_id');
            $table->foreignId('grade_id')->nullable();
            $table->foreignId('role_id');
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->String('profile_pic')->nullable();
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
};
