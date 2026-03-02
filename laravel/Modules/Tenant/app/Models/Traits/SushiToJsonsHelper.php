<?php

declare(strict_types=1);

namespace Modules\Tenant\Models\Traits;

use Illuminate\Support\Facades\File;
use function Safe\json_decode;
use function Safe\json_encode;

/**
 * Trait SushiToJsonsHelper.
 *
 * Fornisce i metodi mancanti per il trait SushiToJsons.
 * Questo trait deve essere aggiunto a tutti i modelli che usano
 * SushiToJsons per soddisfare PHPStan Level 10.
 *
 * NOTA: Questo trait fornisce solo metodi che NON sono in SushiToJsons.
 * Non ci sono collisioni con SushiToJson perché i modelli che usano
 * SushiToJsons NON usano SushiToJson.
 *
 * @see SushiToJsons
 */
trait SushiToJsonsHelper
{
    /**
     * Carica i dati esistenti dal file JSON.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function loadExistingData(): array
    {
        $filePath = $this->getJsonFile();

        if (! File::exists($filePath)) {
            return [];
        }

        $content = File::get($filePath);
        if ($content === '') {
            return [];
        }

        $data = json_decode($content, true);

        return is_array($data) ? $data : [];
    }

    /**
     * Ottiene l'ID dell'utente autenticato per i campi di audit.
     *
     * @return int|string|null
     */
    protected function authId(): int|string|null
    {
        if (function_exists('authId')) {
            return authId();
        }

        if (class_exists('\Illuminate\Support\Facades\Auth')) {
            $user = auth()->user();
            if ($user !== null) {
                return $user->getKey();
            }
        }

        return null;
    }

    /**
     * Assicura che la directory per il file JSON esista.
     *
     * @param string|null $filePath
     * @return void
     */
    protected function ensureDirectoryExists(?string $filePath = null): void
    {
        $path = $filePath ?? $this->getJsonFile();
        $directory = dirname($path);

        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0o755, true, true);
        }
    }

    /**
     * Salva i dati nel file JSON.
     *
     * @param array<int, array<string, mixed>> $data
     * @return void
     */
    protected function saveToJson(array $data): void
    {
        $this->ensureDirectoryExists();
        File::put($this->getJsonFile(), json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * Trova l'indice della riga nel file JSON per l'ID specificato.
     *
     * @param int $id
     * @return int|null
     */
    protected function findRowIndexById(int $id): ?int
    {
        $data = $this->loadExistingData();

        foreach ($data as $index => $row) {
            if (isset($row['id']) && (int) $row['id'] === $id) {
                return $index;
            }
        }

        return null;
    }
}