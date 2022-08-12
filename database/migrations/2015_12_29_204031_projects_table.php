<?php

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProjectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('title');
            $table->text('description');
            $table->integer('user_assigned_id')->unsigned();
            // $table->foreign('user_assigned_id')->references('id')->on('users');
            // $table->foreignIdFor(User::class)->constrained();
            $table->integer('status_id')->unsigned();
            // $table->foreign('status_id')->references('id')->on('statuses');
            // $table->foreignIdFor(Status::class)->constrained();

            $table->integer('user_created_id')->unsigned();
            // $table->foreign('user_created_id')->references('id')->on('users');
            // $table->foreignId('user_created_id')->constrained();
            
            $table->integer('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            // $table->foreignIdFor(Client::class)->constrained()->cascadeOnDelete();
            
            // $table->foreignIdFor(Invoice::class)->nullable()->constrained()->cascadeOnDelete();
            $table->integer('invoice_id')->unsigned()->nullable();
            // $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->date('deadline');
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
        Schema::drop('projects');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
