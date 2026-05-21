<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'users',
            'categories',
            'products',
            'orders',
            'order_items',
            'settings',
            'events',
            'newsletters',
            'roles',
            'permissions',
        ];

        foreach ($tables as $table) {
            if (! Schema::hasColumn($table, 'uuid')) {
                Schema::table($table, function (Blueprint $blueprint) {
                    $blueprint->uuid('uuid')->nullable()->after('id');
                });
            }

            DB::table($table)->whereNull('uuid')->lazyById()->each(function (object $row) use ($table): void {
                DB::table($table)->where('id', $row->id)->update(['uuid' => (string) Str::uuid()]);
            });

            $indexName = "{$table}_uuid_unique";
            $hasIndex = collect(DB::select("PRAGMA index_list(\"{$table}\")"))->contains('name', $indexName);

            if (! $hasIndex) {
                Schema::table($table, function (Blueprint $blueprint) use ($indexName) {
                    $blueprint->unique('uuid', $indexName);
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'users',
            'categories',
            'products',
            'orders',
            'order_items',
            'settings',
            'events',
            'newsletters',
            'roles',
            'permissions',
        ];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $blueprint) use ($table) {
                $blueprint->dropUnique("{$table}_uuid_unique");
                $blueprint->dropColumn('uuid');
            });
        }
    }
};
