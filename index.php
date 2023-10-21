<?php
define("ROTA_GERAL", "http://$_SERVER[HTTP_HOST]/SaudeInforma");

require_once __DIR__ . "/App/Config/autoload.php";

$rota = new Routers();
$rota->run();