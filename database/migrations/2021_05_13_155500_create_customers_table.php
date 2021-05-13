<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300);
            $table->text('address')->nullable();
            $table->boolean('checked')->nullable();
            $table->text('description')->nullable();
            $table->text('interest')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('email',300)->nullable();
            $table->bigInteger('account')->nullable();
            $table->unique('account');
            $table->json('credit_card')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
