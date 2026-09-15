<?php

declare(strict_types=1);

return [
    'navigation' => [
        'label' => 'Invio Email (Spatie]',
        'group' => 'Notifiche'],
    'actions' => [
        'emailFormActions' => ['label' => 'emailFormActions', 'tooltip' => 'emailFormActions', 'icon' => 'emailFormActions'],
        'logout' => ['tooltip' => 'logout', 'icon' => 'logout', 'label' => 'logout'],
        'profile' => ['tooltip' => 'profile', 'icon' => 'profile'],
        'save' => ['label' => 'save', 'icon' => 'save', 'tooltip' => 'save']],
    'fields' => [
        'body_html' => [
            'description' => 'body_html',
            'helper_text' => '',
            'placeholder' => 'body_html',
            'label' => 'body_html',
            'tooltip' => ''],
        'subject' => [
            'description' => 'subject',
            'helper_text' => '',
            'placeholder' => 'subject',
            'label' => 'subject',
            'tooltip' => ''],
        'to' => [
            'description' => 'to',
            'helper_text' => '',
            'placeholder' => 'to',
            'label' => 'to',
            'tooltip' => ''],
        'mail_templates' => [
            'description' => 'mail_templates',
            'helper_text' => '',
            'placeholder' => 'mail_templates',
            'label' => '',
            'tooltip' => ''],
        'mail_template_slug' => [
            'description' => 'mail_template_slug',
            'helper_text' => '',
            'placeholder' => 'mail_template_slug',
            'label' => 'mail_template_slug',
            'tooltip' => ''],
        'recipient' => [
            'description' => 'recipient',
            'helper_text' => '',
            'placeholder' => 'recipient',
            'label' => 'recipient',
            'tooltip' => '']],
    'label' => 'Send Spatie Email',
    'plural_label' => 'Send Spatie Email (Plurale)'];
