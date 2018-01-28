<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned()->index()->foreign()->references("id")->on("familys");
            $table->string('name');
            $table->string('local_name')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->integer('order')->default(0);
            $table->string('chinese_zodiac')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('members');
        Storage::delete('public/');
    }
}
