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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('google', 500)->nullable()->after('github_token');
            $table->string('yandex', 500)->nullable();
            $table->string('bing', 500)->nullable();
            $table->string('google_tag_manager_head', 500)->nullable();
            $table->string('google_tag_manager_body', 500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
