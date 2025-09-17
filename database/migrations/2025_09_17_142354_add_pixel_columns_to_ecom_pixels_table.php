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
        Schema::table('ecom_pixels', function (Blueprint $table) {
                $table->string('test_event_code')->nullable();
                $table->text('access_token')->nullable()->after('test_event_code');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('ecom_pixels', function (Blueprint $table) {
                $table->dropColumn(['test_event_code', 'access_token']);
            });
    }
};
