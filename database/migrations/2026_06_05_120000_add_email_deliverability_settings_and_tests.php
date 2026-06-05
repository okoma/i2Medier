<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('deliverability_capture_driver')->nullable()->after('mistral_model');
            $table->string('deliverability_test_inbox_address')->nullable()->after('deliverability_capture_driver');
            $table->boolean('deliverability_auto_delete')->default(true)->after('deliverability_test_inbox_address');
            $table->string('deliverability_postmark_webhook_token')->nullable()->after('deliverability_auto_delete');
            $table->string('deliverability_imap_host')->nullable()->after('deliverability_postmark_webhook_token');
            $table->unsignedSmallInteger('deliverability_imap_port')->nullable()->after('deliverability_imap_host');
            $table->string('deliverability_imap_encryption')->nullable()->after('deliverability_imap_port');
            $table->string('deliverability_imap_username')->nullable()->after('deliverability_imap_encryption');
            $table->text('deliverability_imap_password')->nullable()->after('deliverability_imap_username');
            $table->string('deliverability_imap_folder')->nullable()->after('deliverability_imap_password');
        });

        Schema::create('email_deliverability_tests', function (Blueprint $table) {
            $table->id();
            $table->string('public_id')->unique();
            $table->string('subject_token')->unique();
            $table->string('source_driver');
            $table->string('status')->default('pending');
            $table->string('input');
            $table->string('normalized_domain');
            $table->string('sender_address')->nullable();
            $table->string('sending_domain')->nullable();
            $table->string('check_type')->nullable();
            $table->string('client_target')->nullable();
            $table->string('esp')->nullable();
            $table->string('volume')->nullable();
            $table->string('test_recipient');
            $table->string('expected_subject');
            $table->string('received_to_address')->nullable();
            $table->string('received_from_address')->nullable();
            $table->string('received_from_name')->nullable();
            $table->string('provider_message_id')->nullable();
            $table->string('source_message_uid')->nullable();
            $table->longText('raw_headers')->nullable();
            $table->longText('authentication_results')->nullable();
            $table->longText('raw_text')->nullable();
            $table->longText('raw_html')->nullable();
            $table->json('report')->nullable();
            $table->json('meta')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamp('auto_deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_deliverability_tests');

        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'deliverability_capture_driver',
                'deliverability_test_inbox_address',
                'deliverability_auto_delete',
                'deliverability_postmark_webhook_token',
                'deliverability_imap_host',
                'deliverability_imap_port',
                'deliverability_imap_encryption',
                'deliverability_imap_username',
                'deliverability_imap_password',
                'deliverability_imap_folder',
            ]);
        });
    }
};
