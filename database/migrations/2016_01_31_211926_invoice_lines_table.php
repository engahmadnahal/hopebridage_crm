<?php

use App\Models\Invoice;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class InvoiceLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('title');
            $table->text('comment');
            $table->integer('price');
            // $table->unsignedBigInteger('invoice_id');
            // $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreignIdFor(Invoice::class)->constrained()->cascadeOnDelete();
            $table->string('type')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('product_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoice_lines');
    }
}
