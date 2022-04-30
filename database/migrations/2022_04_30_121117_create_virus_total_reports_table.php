<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirusTotalReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virus_total_reports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('scan_id');
            $table->string('permalink');
            $table->string('url');
            $table->dateTime('scan_date')->nullable();
            $table->dateTime('updated_scan_date')->nullable();
            $table->integer('positives');
            $table->integer('totals');
            $table->text('scans_clean_mx');
            $table->text('scans_malwarepatrol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virus_total_reports');
    }
}
