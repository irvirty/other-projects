<?php
// v.1.0.2

$d = "../../../../";

//$q = 'Hello, What is AI?';

if (isset($_GET['q'])&&!empty($_GET['q'])){ $q = $_GET['q']; }
if (isset($_POST['q'])&&!empty($_POST['q'])){ $q = $_POST['q']; }

if (isset($_GET['from'])&&!empty($_GET['from'])){ $from = $_GET['from']; }
if (isset($_POST['from'])&&!empty($_POST['from'])){ $from = $_POST['from']; }

if (isset($_GET['to'])&&!empty($_GET['to'])){ $to = $_GET['to']; }
if (isset($_POST['to'])&&!empty($_POST['to'])){ $to = $_POST['to']; }

if (!empty($q)){

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
$apiKey = $conf["confDeepLApiKey"]; // ⚠️ **Important:** Replace with your actual API key

//https://stackoverflow.com/questions/79513656/how-do-i-fix-this-curl-deepl-code-is-not-working
$authKey = $apiKey;
$_text = $q;
$target_lang = $to;
$formality = "Automatic";
$glossary_id = "My Glossary";
$glossary_id = "";

$source_lang = $from;
$tag_handling = "xml";
$ignore_tags = "x";

$url = "https://api-free.deepl.com/v2/translate";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Authorization: DeepL-Auth-Key $authKey",
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = array(
    'text' => $_text,
    'source_lang' => $source_lang,
    'target_lang' => $target_lang,
    'tag_handling' => $tag_handling,
    'ignore_tags' => $ignore_tags,
    'glossary' => $glossary_id
);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

//for debug only!
//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);

// Check HTTP status code and display the error message
if (!curl_errno($curl)) {
  switch ($http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE)) {
    case 200:  # OK
      break;
    default:
      echo 'DeepL Error: Unexpected HTTP code: ', $http_code;
  }
}

// Check for errors and display the error message
if($errno = curl_errno($curl)) {
    $error_message = curl_strerror($errno);
    echo "DeepL Error: cURL error ({$errno}):\n {$error_message}";
}

curl_close($curl);
echo $resp;
}
?>
