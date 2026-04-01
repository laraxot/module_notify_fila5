#!/usr/bin/env php
<?php
/**
 * GSD HTML Body Comparison Tool
 * Compares HTML structure between Design Comuni original and FixCity replica
 * 
 * Usage: php gsd-html-compare.php
 */

set_time_limit(30);

echo "🔍 GSD HTML Body Comparison Tool\n";
echo "================================\n\n";

$urlOriginal = 'https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html';
$urlReplica = 'http://127.0.0.1:8000/it/tests/homepage';

echo "Original: $urlOriginal\n";
echo "Replica:  $urlReplica\n\n";

// Fetch HTML
echo "⏳ Download pages...\n";
$htmlOriginal = fetchHtml($urlOriginal);
$htmlReplica = fetchHtml($urlReplica);

if (!$htmlOriginal) {
    echo "❌ Error: Cannot download original page\n";
    exit(1);
}

if (!$htmlReplica) {
    echo "❌ Error: Cannot download replica page (HTTP 500? Check Laravel logs)\n";
    exit(1);
}

echo "✅ Pages downloaded\n";
echo "Original: " . number_format(strlen($htmlOriginal)) . " bytes\n";
echo "Replica:  " . number_format(strlen($htmlReplica)) . " bytes\n\n";

// Extract body
echo "📦 Extracting <body> content (excluding scripts)...\n";
$bodyOriginal = extractBody($htmlOriginal);
$bodyReplica = extractBody($htmlReplica);

if (!$bodyOriginal) {
    echo "❌ Error: Cannot extract body from original\n";
    exit(1);
}

if (!$bodyReplica) {
    echo "❌ Error: Cannot extract body from replica\n";
    exit(1);
}

echo "✅ Body extracted\n";
echo "Original: " . number_format(strlen($bodyOriginal)) . " bytes\n";
echo "Replica:  " . number_format(strlen($bodyReplica)) . " bytes\n\n";

// Extract structure
echo "🏗️  Extracting structure...\n";
$structOriginal = extractStructure($bodyOriginal);
$structReplica = extractStructure($bodyReplica);

echo "✅ Structure extracted\n";
echo "Original: " . count($structOriginal) . " elements\n";
echo "Replica:  " . count($structReplica) . " elements\n\n";

// Compare
echo "🔬 Comparing structures...\n\n";

$differences = [];
$matches = 0;
$maxLen = max(count($structOriginal), count($structReplica));

for ($i = 0; $i < $maxLen; $i++) {
    $elem1 = $structOriginal[$i] ?? null;
    $elem2 = $structReplica[$i] ?? null;
    
    if (!$elem1 && $elem2) {
        $differences[] = [
            'type' => 'EXTRA',
            'index' => $i,
            'message' => "➕ EXTRA in replica: <{$elem2['tag']} class=\"{$elem2['class']}\" id=\"{$elem2['id']}\">",
        ];
    } elseif ($elem1 && !$elem2) {
        $differences[] = [
            'type' => 'MISSING',
            'index' => $i,
            'message' => "➖ MISSING in replica: <{$elem1['tag']} class=\"{$elem1['class']}\" id=\"{$elem1['id']}\">",
        ];
    } elseif ($elem1 && $elem2) {
        if ($elem1['tag'] !== $elem2['tag']) {
            $differences[] = [
                'type' => 'TAG',
                'index' => $i,
                'message' => "🏷️  TAG mismatch: {$elem1['tag']} vs {$elem2['tag']}",
            ];
        }
        if ($elem1['class'] !== $elem2['class']) {
            $differences[] = [
                'type' => 'CLASS',
                'index' => $i,
                'message' => "🎨 CLASS mismatch: {$elem1['class']} vs {$elem2['class']}",
            ];
        }
        if ($elem1['id'] !== $elem2['id']) {
            $differences[] = [
                'type' => 'ID',
                'index' => $i,
                'message' => "🆔 ID mismatch: {$elem1['id']} vs {$elem2['id']}",
            ];
        }
        if ($elem1['tag'] === $elem2['tag'] && $elem1['class'] === $elem2['class'] && $elem1['id'] === $elem2['id']) {
            $matches++;
        }
    }
}

// Report
echo "📊 RESULTS:\n";
echo "===========\n\n";

if (empty($differences)) {
    echo "✅✅✅ PERFECT MATCH! HTML structure is IDENTICAL! ✅✅✅\n\n";
} else {
    echo "❌ Differences found:\n\n";
    
    // Group by type
    $byType = [];
    foreach ($differences as $diff) {
        $byType[$diff['type']][] = $diff;
    }
    
    foreach ($byType as $type => $diffs) {
        echo "** $type (" . count($diffs) . ") **\n";
        foreach (array_slice($diffs, 0, 30) as $diff) {
            echo "  - {$diff['message']}\n";
        }
        if (count($diffs) > 30) {
            echo "  ... and " . (count($diffs) - 30) . " more\n";
        }
        echo "\n";
    }
}

// Statistics
echo "📈 Statistics:\n";
echo "  Total elements: " . count($structOriginal) . " (original) vs " . count($structReplica) . " (replica)\n";
echo "  Matching elements: $matches\n";
echo "  Different elements: " . count($differences) . "\n";
$matchPercent = count($structOriginal) > 0 ? ($matches / count($structOriginal) * 100) : 0;
echo "  Match percentage: " . round($matchPercent, 2) . "%\n\n";

// Save report
$reportFile = __DIR__ . '/html-comparison-report-' . date('Y-m-d-His') . '.txt';
$reportContent = generateReport($structOriginal, $structReplica, $differences, $matches, $urlOriginal, $urlReplica);
file_put_contents($reportFile, $reportContent);
echo "💾 Report saved to: $reportFile\n\n";

// Exit codes
if (empty($differences)) {
    exit(0); // Perfect match
} elseif ($matchPercent > 90) {
    exit(1); // Good match, minor differences
} else {
    exit(2); // Bad match
}

// Functions

function fetchHtml($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $html = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($httpCode !== 200 || !$html) {
        echo "  HTTP $httpCode for $url";
        if ($error) echo " - $error";
        echo "\n";
        return null;
    }
    return $html;
}

function extractBody($html) {
    preg_match('/<body[^>]*>(.*?)<\/body>/s', $html, $matches);
    $body = $matches[1] ?? '';
    
    // Remove scripts
    $body = preg_replace('/<script\b[^>]*>.*?<\/script>/is', '', $body);
    
    // Remove styles (optional, comment if you want to compare styles)
    // $body = preg_replace('/<style\b[^>]*>.*?<\/style>/is', '', $body);
    
    // Remove comments (optional)
    // $body = preg_replace('/<!--.*?-->/s', '', $body);
    
    return $body;
}

function extractStructure($html) {
    preg_match_all('/<(\/?)([a-z0-9]+)([^>]*)(\/?)>/i', $html, $matches, PREG_SET_ORDER);
    $structure = [];
    
    foreach ($matches as $match) {
        $close = $match[1] === '/';
        $tag = strtolower($match[2]);
        $attrs = $match[3];
        
        // Skip script and style tags
        if (in_array($tag, ['script', 'style'])) {
            continue;
        }
        
        // Extract class
        preg_match('/class=["\']([^"\']*)["\']/i', $attrs, $classMatch);
        $class = $classMatch[1] ?? '';
        
        // Extract id
        preg_match('/id=["\']([^"\']*)["\']/i', $attrs, $idMatch);
        $id = $idMatch[1] ?? '';
        
        $structure[] = [
            'close' => $close,
            'tag' => $tag,
            'class' => $class,
            'id' => $id,
        ];
    }
    
    return $structure;
}

function generateReport($structOriginal, $structReplica, $differences, $matches, $urlOriginal, $urlReplica) {
    $report = "GSD HTML Body Comparison Report\n";
    $report .= "================================\n\n";
    $report .= "Date: " . date('Y-m-d H:i:s') . "\n";
    $report .= "Original: $urlOriginal\n";
    $report .= "Replica:  $urlReplica\n\n";
    
    $report .= "Statistics:\n";
    $report .= "  Original elements: " . count($structOriginal) . "\n";
    $report .= "  Replica elements:  " . count($structReplica) . "\n";
    $report .= "  Matching: $matches\n";
    $report .= "  Different: " . count($differences) . "\n";
    $matchPercent = count($structOriginal) > 0 ? ($matches / count($structOriginal) * 100) : 0;
    $report .= "  Match: " . round($matchPercent, 2) . "%\n\n";
    
    if (empty($differences)) {
        $report .= "✅ PERFECT MATCH!\n";
    } else {
        $report .= "Differences:\n";
        foreach ($differences as $diff) {
            $report .= "  - {$diff['message']}\n";
        }
    }
    
    return $report;
}
