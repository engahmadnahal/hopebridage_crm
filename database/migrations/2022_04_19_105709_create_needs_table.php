<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('title');
            $table->text('description');
            // $table->integer('status_id')->unsigned();
            // $table
            //     ->foreign('status_id')
            //     ->references('id')
            //     ->on('statuses');
            $table->foreignIdFor(Status::class)->constrained()->cascadeOnDelete();

            $table->unsignedBigInteger('user_assigned_id')->unsigned();
            $table
                ->foreign('user_assigned_id')
                ->references('id')
                ->on('users');
                
            $table->unsignedBigInteger('user_created_id')->unsigned();
            $table
                ->foreign('user_created_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('client_id')->unsigned();
            $table
                ->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');

            $table
                ->unsignedBigInteger('invoice_id')
                ->unsigned()
                ->nullable();
            $table
                ->foreign('invoice_id')
                ->references('id')
                ->on('invoices');
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
        Schema::dropIfExists('needs');
    }
}
