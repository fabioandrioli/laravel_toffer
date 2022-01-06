<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("collection_id")->nullable();
            $table->string("collection_status")->nullable();
            $table->string("payment_id")->nullable();
            $table->string("status")->nullable();
            $table->string("external_reference")->nullable();
            $table->string("payment_type")->nullable();
            $table->string("merchant_order_id")->nullable();
            $table->string("preference_id")->nullable();
            $table->string("site_id")->nullable();
            $table->string("merchant_account_id")->nullable();
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
        Schema::dropIfExists('orders');
    }
}
