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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('order_number');
            $table->string('banner')->nullable();
            $table->longText('content');
            $table->boolean('is_available');
            $table->string('homework_media')->nullable();
            $table->enum('destination',['lection','practice','test','exam']);
            $table->foreignId('discipline_id')->nullable()->constrained('disciplines')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('lessons');
    }
};
