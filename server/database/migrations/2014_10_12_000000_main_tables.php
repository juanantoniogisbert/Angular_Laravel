<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class MainTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('favorite_rockets', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->tinyInteger('user_id')->unsigned();
            $table->string('rocket_id');
            //$table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id')->index()->unsigned();
            $table->tinyInteger('user_id')->unsigned();
            $table->string('content');
            //$table->foreign('user_id')->references('id')->on('users');
        });
        // insert admin
        DB::table('users')->insert(
            array(
                'email' => 'admin',
                'name' => 'admin',
                'password' => '$2y$10$/UB25CPnTCFmQhO0xOnM5elHuMVeNA2AGFha6Qdih1dv/69uqi7hG'
            )
        );
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
        Schema::dropIfExists('rockets');
        Schema::dropIfExists('favorite_rockets');
        Schema::dropIfExists('notes');
    }
}