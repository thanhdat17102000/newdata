<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_shop', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('name',255);
            $table->string('domain',255);
            $table->string('customer_email',255);
            $table->string('plan_display_name',255);
            $table->timestamps();
        });
        Schema::create('product', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('title',255);
            $table->text('content');
            $table->enum('status',['active','is_active']);
            $table->text('image')->nullable();
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
        Schema::dropIfExists('info_shop');
        Schema::dropIfExists('product');
    }
};
