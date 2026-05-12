<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: https://netanelgolan.com');

$input = trim($_POST['q'] ?? '');
if (empty($input) || strlen($input) > 500) {
    echo json_encode(['error' => true]);
    exit;
}

$api_key = getenv('ANTHROPIC_API_KEY') ?: getenv('CLAUDE_API_KEY') ?: '';
if (empty($api_key)) { echo json_encode(['error' => true]); exit; }

$body = json_encode([
    'model' => 'claude-sonnet-4-6',
    'max_tokens' => 300,
    'system' => 'אתה נתנאל גולן, מומחה עיצוב שיער וגבות עם 25 שנות ניסיון מהוד השרון. ענה בעברית, בשפה חמה ומקצועית. תן עצות מעשיות וספציפיות. מקסימום 4 משפטים. אל תפתח ב"כמובן" או "בהחלט".',
    'messages' => [['role' => 'user', 'content' => $input]]
]);

$ch = curl_init('https://api.anthropic.com/v1/messages');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'x-api-key: ' . $api_key,
        'anthropic-version: 2023-06-01'
    ],
    CURLOPT_TIMEOUT => 15,
]);

$res = curl_exec($ch);
curl_close($ch);

$data = json_decode($res, true);
$text = $data['content'][0]['text'] ?? null;

if ($text) {
    echo json_encode(['answer' => $text]);
} else {
    echo json_encode(['error' => true]);
}
