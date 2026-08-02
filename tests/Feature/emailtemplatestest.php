<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

use function Safe\file_get_contents;

uses(TestCase::class);

test('html template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/html.blade.php');

    // Verifico che il file esiste
    Assert::assertFileExists($filePath, 'Il file html.blade.php non esiste');

    // Leggo il contenuto del file
    $content = file_get_contents($filePath);

    // Verifico che contiene la funzione optional per subject
    Assert::assertStringContainsString('optional($email_data)->subject', $content);

    // Verifico che contiene la funzione optional per body_html
    Assert::assertStringContainsString('optional($email_data)->body_html', $content);
});

test('sunny template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/templates/sunny.blade.php');

    // Verifico che il file esiste
    Assert::assertFileExists($filePath, 'Il file sunny.blade.php non esiste');

    // Leggo il contenuto del file
    $content = file_get_contents($filePath);

    // Verifico che contiene la funzione optional per cssInLine
    Assert::assertStringContainsString('optional($_theme)->cssInLine', $content);
});

test('ark template contains optional function', function (): void {
    // Percorso del file
    $filePath = base_path('Modules/Notify/resources/views/emails/templates/ark.blade.php');

    // Verifico che il file esiste
    Assert::assertFileExists($filePath, 'Il file ark.blade.php non esiste');

    // Leggo il contenuto del file
    $content = file_get_contents($filePath);

    // Verifico che contiene la funzione optional per cssInLine
    Assert::assertStringContainsString('optional($_theme)->cssInLine', $content);
});
