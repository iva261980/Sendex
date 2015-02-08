<?php
/**
 * Created by PhpStorm.
 * User: iva2658
 * Date: 05.02.2015
 * Time: 21:11
 */

// Подключаем
define('MODX_API_MODE', true);
require '../index.php';

// Включаем обработку ошибок
$modx->getService('error','error.modError');
$modx->setLogLevel(modX::LOG_LEVEL_INFO);
$modx->setLogTarget(XPDO_CLI_MODE ? 'ECHO' : 'HTML');

echo '<pre>';
print_r($modx->config);