<?php
//v.1.0.0

$d = "../../../../";

$q = "";

if(isset($_GET['q'])&&!empty($_GET['q'])){ $q = $_GET['q']; }
if(isset($_POST['q'])&&!empty($_GET['q'])){ $q = $_POST['q']; }

$qPrint = htmlspecialchars($q);

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

$qPrint
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

<form method="GET" action="index.php" autocomplete="off">

<div class="block padding-bottom2"></div>
<label class="xSmall op block" for="q">text:</label>
<textarea id="q" class="padding2 border-radius" name="q" rows="4" cols="50">$q</textarea>

<input class="xSmall submit" type="submit">


</form>
</div>


</div>
</main>
<!-- // content -->

EOF;

include_once $d.'includes/bottom.php';

?>
