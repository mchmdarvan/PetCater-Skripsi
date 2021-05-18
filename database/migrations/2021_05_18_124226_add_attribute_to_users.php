<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('address_one')->nullable();
            $table->longText('address_two')->nullable();
            $table->integer('provinces_id')->nullable();
            $table->integer('regencies_id')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('store_name')->nullable();
            $table->string('categories_name')->nullable();
            $table->string('store_status')->nullable();

            $table->string('roles')->default('USER');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('address_one')->nullable(false);
            $table->longText('address_two')->nullable(false);
            $table->integer('provinces_id')->nullable(false);
            $table->integer('regencies_id')->nullable(false);
            $table->integer('zip_code')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('store_name')->nullable(false);
            $table->string('categories_name')->nullable(false);
            $table->string('store_status')->nullable(false);

            $table->dropColumn('roles');
        });
    }
}
