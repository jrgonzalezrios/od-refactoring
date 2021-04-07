<?php

define('ROOT_PATH', realpath(__DIR__ . '/..') . '/');
define('APP_PATH', ROOT_PATH . 'src/');

/* Autoload for vendor */
require_once ROOT_PATH . 'vendor/autoload.php';

require_once APP_PATH . 'integration/IntegrationClient.php';
require_once APP_PATH . 'integration/Shopify/ShopifyClient.php';
require_once APP_PATH . 'integration/WooCommerce/WooCommerceClient.php';
require_once APP_PATH . 'app.php';



