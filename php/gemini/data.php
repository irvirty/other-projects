<?php
// v.1.0.2

$d = "../../../../";

$q = 'Hello, What is AI?';

if (isset($_GET['q'])&&!empty($_GET['q'])){ $q = $_GET['q']; }
if (isset($_POST['q'])&&!empty($_GET['q'])){ $q = $_POST['q']; }


// start
/*curl "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent" \
  -H 'Content-Type: application/json' \
  -H 'X-goog-api-key: key' \
  -X POST \
  -d '{
    "contents": [
      {
        "parts": [
          {
            "text": "Explain how AI works in a few words"
          }
        ]
      }
    ]
  }'*/

include_once $d.'config2.php';

// openai php query using Curl

// https://stackoverflow.com/questions/8115683/php-curl-custom-headers
$ch = curl_init();
//https://aistudio.google.com/apikey


// Gemini: hello, please convert this to PHP code:
// Your Gemini API Key
$apiKey = $conf["confGeminiApiKey"]; // ⚠️ **Important:** Replace with your actual API key

// The API endpoint
//$url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $apiKey;
$url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=' . $apiKey;

// The data to send in the request
$data = [
    'contents' => [
        [
            'parts' => [
                [
                    'text' => $q
                ]
            ]
        ]
    ]
];

// Encode the data as JSON
$jsonData = json_encode($data);

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
curl_setopt($ch, CURLOPT_POST, true);           // Set the request method to POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Set the POST data
curl_setopt($ch, CURLOPT_HTTPHEADER, [          // Set the headers
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
]);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // Decode the JSON response
    $responseData = json_decode($response, true);
    // Print the response (or process it as needed)
    print_r($responseData);
}

// Close cURL session
curl_close($ch);

?>
