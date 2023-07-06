<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_lists', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->string('code', 100);
            $table->integer('category_id')->unique();
            $table->text('firstname');
            $table->text('middlename');
            $table->text('lastname');
            $table->text('contact');
            $table->string('meter_code', 100);
            $table->float('first_reading', 12, 2);
            $table->tinyinteger('status');
            $table->tinyinteger('delete_flag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_lists');
    }
};
