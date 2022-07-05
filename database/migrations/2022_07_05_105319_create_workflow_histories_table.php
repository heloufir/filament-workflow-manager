<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('old_status_id')->nullable()->constrained('workflow_statuses');
            $table->foreignId('new_status_id')->constrained('workflow_statuses');
            $table->foreignId('user_id')->constrained((new (config('auth.providers.users.model')))->getTable());
            $table->morphs('modelable');
            $table->dateTime('executed_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workflow_histories');
    }
};
