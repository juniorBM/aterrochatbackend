<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    protected $connection = 'mongodb';
    public function up()
    {
        Schema::table('users', function(Blueprint $collection) {
            $collection->unique('email');
            $collection->index('name');
            $collection->index('lastname');
//            $table->string('password', 200);
//            $table->string('api_token')->nullable();
            $collection->timestamps();

        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $collection)
        {
            $collection->drop();
        });
    }
}
