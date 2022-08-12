<?php

use App\Models\Client;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('name');
            $table->string('email');
            $table->string('primary_number')->nullable()->defualt(null);
            $table->string('secondary_number')->nullable()->defualt(null);
            // $table->integer('client_id')->unsigned();
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onDelete('cascade');
            $table->foreignIdFor(Client::class)->constrained()->cascadeOnDelete();

            $table->boolean('is_primary')->defualt(false);
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
        Schema::drop('contacts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
