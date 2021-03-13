<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', $precision = 8, $scale = 2)->unsigned();
            $table->timestamp('payed_at')->nullable();
            $table->bigInteger('order_id')->unsigned();            
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');

            $table->engine = "InnoDB"; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
