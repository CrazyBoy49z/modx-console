<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__FILE__, 4).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$processor_path = $modx->getOption(
        'console.core_path',
        null,
        $modx->getOption('core_path').'components/console/'
    ).'processors/';

$modx->lexicon->load('console:default');
$modx->request->handleRequest(
    array(
        'processors_path' => $processor_path,
        'location' => '',
    )
);
