<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{


    public function up(): void{Schema::table('job_offer_user', function (Blueprint $table) {$table->string('offer_status')->nullable();});}



    public function down(): void{Schema::table('job_offer_user', function (Blueprint $table) {$table->dropColumn('offer_status');});}
};
