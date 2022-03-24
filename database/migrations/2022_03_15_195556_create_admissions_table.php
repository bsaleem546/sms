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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('religion');
            $table->string('cast');
            $table->string('blood_group')->nullable();
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('country');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('extra_note')->nullable();
            $table->string('gr_no')->unique();
            $table->string('father_name');
            $table->string('father_phone')->nullable();
            $table->string('father_occ')->nullable();
            $table->string('mother_name');
            $table->string('mother_phone')->nullable();
            $table->string('mother_occ')->nullable();
            $table->string('student_pic');
            $table->boolean('is_trans')->default(0);
            $table->integer('transport_id')->default(0); //default 0
            $table->foreignId('__class_id')->constrained('__classes');
            $table->foreignId('__session_id')->constrained('__sessions');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('student_auth_id')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('admissions');
    }
};
