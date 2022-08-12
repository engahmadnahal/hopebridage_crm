<?php

use App\Models\Client;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('title');
            $table->text('description');
            // $table->integer('status_id')->unsigned();
            // $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreignIdFor(Status::class)->constrained();

            // $table->integer('user_assigned_id')->unsigned();
            $table->unsignedBigInteger('user_assigned_id');
            $table->foreign('user_assigned_id')->references('id')->on('users');
            // $table->foreignId('user_assigned_id')->constrained();

            // $table->integer('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignIdFor(Client::class)->constrained()->cascadeOnDelete();
            
            // $table->integer('user_created_id')->unsigned();
            $table->unsignedBigInteger('user_created_id');
            $table->foreign('user_created_id')->references('id')->on('users');
            // $table->foreignIdFor(User::class,'user_created_id')->constrained();

            $table->datetime('deadline');
            $table->softDeletes();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('leads');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
