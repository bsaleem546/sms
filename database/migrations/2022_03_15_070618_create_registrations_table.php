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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('religion');
            $table->string('cast')->nullable();
            $table->string('blood_group')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('id_no')->nullable();
            $table->string('id_proof')->nullable();
            $table->string('extra_note')->nullable();
            $table->string('father_name');
            $table->string('father_phone')->nullable();
            $table->string('father_occ')->nullable();
            $table->string('mother_name');
            $table->string('mother_phone')->nullable();
            $table->string('mother_occ')->nullable();
            $table->string('class_name');
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
        Schema::dropIfExists('registrations');
    }
};
