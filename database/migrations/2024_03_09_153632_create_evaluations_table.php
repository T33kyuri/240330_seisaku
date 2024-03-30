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
        Schema::create('evaluations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('user_ID');
                $table->string('user_name');
                $table->integer('user_company_id')->nullable(); // NULL許容に変更
                $table->string('company_name')->nullable(); // NULL許容に変更
                $table->integer('hyouka_year');
                $table->integer('hyouka_month');
                $table->integer('hyouka_ID')->nullable(); // NULL許容に変更
                $table->string('hyouka_name')->nullable(); // NULL許容に変更
                $table->string('hyouka_relationship')->nullable(); // NULL許容に変更
                $table->string('hyouka_title')->nullable(); // NULL許容に変更
                $table->string('hyouka_content_1')->nullable(); // NULL許容に変更
                $table->string('hyouka_content_2')->nullable(); // NULL許容に変更
                $table->string('hyouka_content_3')->nullable(); // NULL許容に変更
            $table->datetime('published');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
