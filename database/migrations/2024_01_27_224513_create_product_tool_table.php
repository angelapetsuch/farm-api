<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tool', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('tool_id');
            $table->integer('tool_qty_needed');
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
        Schema::dropIfExists('product_tool');
    }
}
