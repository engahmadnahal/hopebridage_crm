<?php

use App\Models\Client;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInvociesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('status');
            $table->string('invoice_no')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('payment_received_at')->nullable();
            $table->dateTime('due_at')->nullable();
            // $table->integer('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreignIdFor(Client::class)->constrained();
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
        Schema::drop('invoices');
    }
}
