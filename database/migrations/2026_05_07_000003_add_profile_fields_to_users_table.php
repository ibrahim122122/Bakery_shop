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
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'address')) {
                $table->string('address')->after('name')->nullable(false);
            }
            if (! Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->after('address')->nullable(false);
            }
            if (! Schema::hasColumn('users', 'age')) {
                $table->string('age')->after('phone')->nullable(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'phone', 'age']);
        });
    }
};
