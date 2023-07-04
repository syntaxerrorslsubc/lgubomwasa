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
        Schema::create('billing_lists', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->integer('clientid')->unique();
            $table->date('reading_date');
            $table->date('due_date');
            $table->float('reading', 12, 2);
            $table->float('previous', 12, 2);
            $table->float('rate', 12, 2);
            $table->float('total', 12, 2);
            $table->tinyinteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_lists');
    }
};
