<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | Controls the default mailer. Use "transactional" for system emails and
    | "newsletter" for bulk/marketing emails. Both can be driven by either
    | SMTP or SES — switch by changing *_TRANSPORT in your .env.
    |
    */

    'default' => env('MAIL_MAILER', 'transactional'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Supported transports: "smtp", "ses", "ses-v2", "log", "array"
    |
    | TRANSACTIONAL  — password resets, contact forms, order confirmations
    | NEWSLETTER     — campaigns, announcements, bulk sends
    |
    | To use SMTP:  set *_TRANSPORT=smtp and fill the SMTP_* variables.
    | To use SES:   set *_TRANSPORT=ses and fill AWS_* variables.
    |
    */

    'mailers' => [

        // ── TRANSACTIONAL ─────────────────────────────────────────────────
        'transactional' => [
            'transport'    => env('MAIL_TRANSACTIONAL_TRANSPORT', 'smtp'),

            // SMTP settings (used when transport = smtp)
            'scheme'       => env('MAIL_TRANSACTIONAL_SCHEME', 'tls'),
            'host'         => env('MAIL_TRANSACTIONAL_HOST', '127.0.0.1'),
            'port'         => env('MAIL_TRANSACTIONAL_PORT', 587),
            'username'     => env('MAIL_TRANSACTIONAL_USERNAME'),
            'password'     => env('MAIL_TRANSACTIONAL_PASSWORD'),
            'timeout'      => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),

            // SES region override (used when transport = ses / ses-v2)
            'region'       => env('AWS_SES_REGION', env('AWS_DEFAULT_REGION', 'us-east-1')),
        ],

        // ── NEWSLETTER ────────────────────────────────────────────────────
        'newsletter' => [
            'transport'    => env('MAIL_NEWSLETTER_TRANSPORT', 'smtp'),

            // SMTP settings (used when transport = smtp)
            'scheme'       => env('MAIL_NEWSLETTER_SCHEME', 'tls'),
            'host'         => env('MAIL_NEWSLETTER_HOST', '127.0.0.1'),
            'port'         => env('MAIL_NEWSLETTER_PORT', 587),
            'username'     => env('MAIL_NEWSLETTER_USERNAME'),
            'password'     => env('MAIL_NEWSLETTER_PASSWORD'),
            'timeout'      => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),

            // SES region override (used when transport = ses / ses-v2)
            'region'       => env('AWS_SES_REGION', env('AWS_DEFAULT_REGION', 'us-east-1')),
        ],

        // ── STANDARD MAILERS ──────────────────────────────────────────────

        'smtp' => [
            'transport'    => 'smtp',
            'scheme'       => env('MAIL_SCHEME'),
            'url'          => env('MAIL_URL'),
            'host'         => env('MAIL_HOST', '127.0.0.1'),
            'port'         => env('MAIL_PORT', 2525),
            'username'     => env('MAIL_USERNAME'),
            'password'     => env('MAIL_PASSWORD'),
            'timeout'      => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url((string) env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path'      => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel'   => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers'   => ['transactional', 'log'],
            'retry_after' => 60,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name'    => env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Per-route "From" Addresses
    |--------------------------------------------------------------------------
    |
    | Use these in Mailables:
    |   from(config('mail.transactional_from.address'), config('mail.transactional_from.name'))
    |   from(config('mail.newsletter_from.address'),    config('mail.newsletter_from.name'))
    |
    */

    'transactional_from' => [
        'address' => env('MAIL_TRANSACTIONAL_FROM_ADDRESS', env('MAIL_FROM_ADDRESS', 'hello@example.com')),
        'name'    => env('MAIL_TRANSACTIONAL_FROM_NAME',    env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel'))),
    ],

    'newsletter_from' => [
        'address' => env('MAIL_NEWSLETTER_FROM_ADDRESS', env('MAIL_FROM_ADDRESS', 'hello@example.com')),
        'name'    => env('MAIL_NEWSLETTER_FROM_NAME',    env('MAIL_FROM_NAME', env('APP_NAME', 'Laravel'))),
    ],

];
