<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration
{
    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        Schema::create('notification_logs', function (Blueprint $table) {
            $table->id();
            $table->string('notifiable_type');
            $table->unsignedBigInteger('notifiable_id');
            $table->string('title');
            $table->text('content');
            $table->json('channels');
            $table->json('data')->nullable();
            $table->timestamp('sent_at');
            $table->string('status'); // sent, failed, pending
            $table->text('error')->nullable();
            $table->timestamps();

            $table->index(['notifiable_type', 'notifiable_id']);
            $table->index('status');
            $table->index('sent_at');
        });
    }

    /**
     * Annulla la migrazione.
     */
};
