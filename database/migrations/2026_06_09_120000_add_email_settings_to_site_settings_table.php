<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            // Transactional mailer
            $table->string('mail_transactional_transport')->default('smtp')->nullable();
            $table->string('mail_transactional_from_address')->nullable();
            $table->string('mail_transactional_from_name')->nullable();
            $table->string('mail_transactional_scheme')->default('tls')->nullable();
            $table->string('mail_transactional_host')->nullable();
            $table->unsignedSmallInteger('mail_transactional_port')->default(587)->nullable();
            $table->string('mail_transactional_username')->nullable();
            $table->text('mail_transactional_password')->nullable(); // encrypted

            // Newsletter mailer
            $table->string('mail_newsletter_transport')->default('smtp')->nullable();
            $table->string('mail_newsletter_from_address')->nullable();
            $table->string('mail_newsletter_from_name')->nullable();
            $table->string('mail_newsletter_scheme')->default('tls')->nullable();
            $table->string('mail_newsletter_host')->nullable();
            $table->unsignedSmallInteger('mail_newsletter_port')->default(587)->nullable();
            $table->string('mail_newsletter_username')->nullable();
            $table->text('mail_newsletter_password')->nullable(); // encrypted

            // AWS SES (shared across both mailers)
            $table->text('aws_ses_key')->nullable();    // encrypted
            $table->text('aws_ses_secret')->nullable(); // encrypted
            $table->string('aws_ses_region')->default('us-east-1')->nullable();

            // Email routing — which mailer handles each email type
            $table->string('mail_route_contact_form')->default('transactional')->nullable();
            $table->string('mail_route_onboarding')->default('transactional')->nullable();
            $table->string('mail_route_invoice')->default('transactional')->nullable();
            $table->string('mail_route_password_reset')->default('transactional')->nullable();
            $table->string('mail_route_admin_notification')->default('transactional')->nullable();
            $table->string('mail_route_campaign')->default('newsletter')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'mail_transactional_transport', 'mail_transactional_from_address',
                'mail_transactional_from_name', 'mail_transactional_scheme',
                'mail_transactional_host', 'mail_transactional_port',
                'mail_transactional_username', 'mail_transactional_password',
                'mail_newsletter_transport', 'mail_newsletter_from_address',
                'mail_newsletter_from_name', 'mail_newsletter_scheme',
                'mail_newsletter_host', 'mail_newsletter_port',
                'mail_newsletter_username', 'mail_newsletter_password',
                'aws_ses_key', 'aws_ses_secret', 'aws_ses_region',
                'mail_route_contact_form', 'mail_route_onboarding',
                'mail_route_invoice', 'mail_route_password_reset',
                'mail_route_admin_notification', 'mail_route_campaign',
            ]);
        });
    }
};
