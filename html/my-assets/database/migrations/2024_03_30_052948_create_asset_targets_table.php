<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 資産目標額を設定
     * 資産合計額と比較して目標までの期間を表示
     * モチベーション維持のために設定
     * 毎月管理してもらえる工夫をする
     */
    public function up(): void
    {
        Schema::create('asset_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->integer('target_asset')->nullable(false)->comment('目標の金額');
            $table->date('target_date')->nullable(false)->comment('目標の期日');
            $table->tinyInteger('status')->nullable(false)->comment('目標の状態');
            $table->text('description')->comment('メモ、コメント、理由');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_targets');
    }
};
