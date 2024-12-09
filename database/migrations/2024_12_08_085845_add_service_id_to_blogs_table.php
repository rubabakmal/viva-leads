<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceIdToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable()->after('id'); // Add service_id column
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null'); // Foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['service_id']); // Remove foreign key constraint
            $table->dropColumn('service_id');   // Drop the service_id column
        });
    }
}
