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
        Schema::create('united_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_group_id')->nullable()->constrained('groups')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('second_group_id')->nullable()->constrained('groups')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('third_group_id')->nullable()->constrained('groups')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('new_year')->nullable()->constrained('years')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('united_groups');
    }
};
