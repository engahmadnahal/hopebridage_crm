<?php

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class TasksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

            $table->id();
            $table->string('external_id');
            $table->string('title');
            $table->text('description');

            // $table->integer('status_id')->unsigned();
            // $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreignIdFor(Status::class)->constrained();

            $table->unsignedBigInteger('user_assigned_id')->unsigned();
            $table->foreign('user_assigned_id')->references('id')->on('users');

            $table->unsignedBigInteger('user_created_id')->unsigned();
            $table->foreign('user_created_id')->references('id')->on('users');

            // $table->integer('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignIdFor(Client::class)->constrained();

            // $table->integer('invoice_id')->unsigned()->nullable();
            // $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreignIdFor(Invoice::class)->constrained()->cascadeOnDelete();

            // $table->integer('project_id')->unsigned()->nullable();
            // $table->foreign('project_id')->references('id')->on('projects');
            $table->foreignIdFor(Project::class)->constrained()->cascadeOnDelete();

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
        Schema::drop('tasks');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
