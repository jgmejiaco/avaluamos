<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('permissions')) {
            return;
        }

        Schema::table('permissions', function (Blueprint $table) {
            if (! Schema::hasColumn('permissions', 'route_name')) {
                $table->string('route_name')->nullable()->after('guard_name');
            }
            if (! Schema::hasColumn('permissions', 'module')) {
                $table->string('module')->nullable()->after('route_name');
            }
            if (! Schema::hasColumn('permissions', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn(['route_name', 'module']);
        });
    }
};
