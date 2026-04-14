<?php
//v.1.0.0

$d = "../../../../";

$q = 'Hello, What is AI?';
$text = '';

if(isset($_GET['q'])&&!empty($_GET['q'])){ $q = $_GET['q']; }
if(isset($_POST['q'])&&!empty($_GET['q'])){ $q = $_POST['q']; }
if(isset($_GET['text'])&&!empty($_GET['q'])){ $q .= ' '.$_GET['text']; $text = $_GET['text']; }
if(isset($_POST['text'])&&!empty($_GET['q'])){ $q .= ' '.$_POST['text']; $text = $_POST['text']; }

$q = strip_tags($q);

include_once $d.'includes/top.php';

echo <<<EOF

<!-- content -->
<main class="contentCenter">
<div class="wrapper">

EOF;

echo <<<EOF

<!--<header id="secondNav" class="tCenter">
<div class="margin2"></div>
<nav>
<a class="inlineBlock padding" style="padding-left: 0;" href="/">index</a>
<a class="inlineBlock padding" style="padding-right: 0;" href="../">list</a>
</nav>
</header>-->

<h1 class="op tCenter insertIcon">AI API Test</h1>


<div class="light shadow padding2 borderRadius">
<span class="op">prompt:</span>

$q
<hr>
<div class="op padding2List">answer:</div>

<div class="pre">

EOF;


// get data using api
include_once "./data.php";

echo <<<EOF

</div>

</div>

<div class="block padding2"></div>

<div id="form">

<form method="POST" action="index.php" autocomplete="off">

<label class="xSmall op" for="input2">q:</label>
<input id="input2" class="padding2 border-radius" type="search"  name="q" placeholder="" autocomplete="off" value="$q">

<div class="block padding-bottom2"></div>
<label class="xSmall op block" for="text">text:</label>
<textarea id="text" class="padding2 border-radius" name="text" rows="4" cols="50">$text</textarea> 

<input class="xSmall submit" type="submit">


</form>
</div>


</div>
</main>
<!-- // content -->

EOF;

include_once $d.'includes/bottom.php';

?>
