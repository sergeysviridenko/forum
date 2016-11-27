<?php

/*
 +------------------------------------------------------------------------+
 | Phosphorum                                                             |
 +------------------------------------------------------------------------+
 | Copyright (c) 2013-2016 Phalcon Team and contributors                  |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file docs/LICENSE.txt.                        |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to license@phalconphp.com so we can send you a copy immediately.       |
 +------------------------------------------------------------------------+
*/

use Phalcon\Config;
use Phalcon\Logger;

if (!defined('BASE_DIR')) {
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'env.php';
}

defined('HOSTNAME') || define('HOSTNAME', explode('.', gethostname())[0]);

return new Config([
    'site' => [
        'name'        => env('APP_NAME'),
        'url'         => env('APP_URL'),
        'project'     => env('APP_PROJECT'),
        'description' => env('APP_DESCRIPTION'),
        'keywords'    => env('APP_KEYWORDS'),
        'software'    => 'Phosphorum',
        'repo'        => env('APP_REPO'),
        'docs'        => env('APP_DOCS'),
    ],

    'theme' => [
        'use_topics_icon'     => env('THEME_TOPICS_ICON'),
        'inactive_topic_icon' => '/icon/new_none.png',
        'active_topic_icon'   => '/icon/new_some.png',
    ],

    'gravatar' => [
        'default_image' => 'identicon',
        'size'          => 24,
        'rating'        => 'pg',
        'use_https'     => true,
    ],

    'database' => [
        'adapter'  => env('DB_ADAPTER'),
        'host'     => env('DB_HOST'),
        'username' => env('DB_USERNAME'),
        'password' => env('DB_PASSWORD'),
        'dbname'   => env('DB_DATABASE'),
        'charset'  => env('DB_CHARSET')
    ],

    'metadata' => [
        'adapter'     => env('METADATA_DRIVER'),
        'metaDataDir' => BASE_DIR . 'app/cache/metaData/',
    ],

    'application' => [
        'controllersDir' => BASE_DIR . '/app/controllers/',
        'modelsDir'      => BASE_DIR . '/app/models/',
        'viewsDir'       => BASE_DIR . '/app/views/',
        'pluginsDir'     => BASE_DIR . '/app/plugins/',
        'libraryDir'     => BASE_DIR . '/app/library/',
        'phalconDir'     => BASE_DIR . '/app/Phalcon/',
        'development'    => [
            'staticBaseUri' => env('APP_STATIC_URL'),
            'baseUri'       => env('APP_BASE_URI'),
        ],
        'production' => [
            'staticBaseUri' => env('APP_STATIC_URL'),
            'baseUri'       => env('APP_BASE_URI'),
        ],
        'debug' => env('APP_DEBUG'),
    ],

    'volt' => [
        'compiledExt'  => '.php',
        'separator'    => '_',
        'cacheDir'     => BASE_DIR . 'app/cache/volt/',
        'forceCompile' => env('APP_DEBUG'),
    ],

    'dataCache' => [
        'backend'  => env('DATA_CACHE_DRIVER'),
        'frontend' => env('DATA_CACHE_FRONTEND'),
        'lifetime' => env('DATA_CACHE_LIFETIME'),
        'prefix'   => env('DATA_CACHE_PREFIX'),
        'cacheDir' => BASE_DIR . 'app/cache/data/',
    ],

    'modelsCache' => [
        'backend'  => env('MODELS_CACHE_DRIVER'),
        'frontend' => env('MODELS_CACHE_FRONTEND'),
        'lifetime' => env('MODELS_CACHE_LIFETIME'),
        'prefix'   => env('MODELS_CACHE_PREFIX'),
        'host'     => env('MEMCACHED_HOST'),
        'port'     => env('MEMCACHED_PORT'),
        'weight'   => env('MEMCACHED_HOST'),
        'cacheDir' => BASE_DIR . 'app/cache/models/',
    ],

    'viewCache' => [
        'backend'  => env('VIEW_CACHE_DRIVER'),
        'lifetime' => env('VIEW_CACHE_LIFETIME'),
        'prefix'   => env('VIEW_CACHE_PREFIX'),
        'cacheDir' => BASE_DIR . 'app/cache/views/',
    ],

    'session' => [
        'adapter' => env('SESSION_DRIVER'),
    ],

    'mandrillapp' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'github' => [
        'clientId'     => env('GITHUB_CLIENT_ID'),
        'clientSecret' => env('GITHUB_SECRET'),
        'redirectUri'  => env('GITHUB_REDIRECT_URI'),
    ],

    'dropbox' => [
        'accessToken' => env('DROPBOX_TOKEN'),
        'appSecret'   => env('DROPBOX_SECRET'),
        'prefix'      => env('DROPBOX_PREFIX'),
    ],

    'amazonSns' => [
        'secret' => env('AMAZON_SNS_SECRET')
    ],

    'smtp' => [
        'host'     => env('MAIL_HOST'),
        'port'     => env('MAIL_PORT'),
        'security' => env('MAIL_ENCRYPTION'),
        'username' => env('MAIL_USERNAME'),
        'password' => env('MAIL_PASSWORD'),
    ],

    'beanstalk' => [
        'enabled' => env('BEANSTALK_ENABLED'),
        'host'    => env('BEANSTALK_HOST'),
    ],

    'elasticsearch' => [
        'index' => env('ELASTIC_INDEX'),
        'hosts' => [
            env('ELASTIC_HOST') .':' . env('ELASTIC_PORT'),
        ],
    ],

    'mail' => [
        'fromName'  => env('MAIL_FROM_NAME'),
        'fromEmail' => env('MAIL_FROM_ADDRESS'),
    ],

    'logger' => [
        'path'     => BASE_DIR . '/app/logs/',
        'format'   => '[%date%] ' . HOSTNAME . ' php: [%type%] %message%',
        'date'     => 'd-M-Y H:i:s',
        'logLevel' => Logger::INFO,
        'filename' => 'application.log',
    ],

    'error' => [
        'logger'    => BASE_DIR . 'app/logs/error.log',
        'formatter' => [
            'format' => '[%date%] ' . HOSTNAME . ' php: [%type%] %message%',
            'date'   => 'd-M-Y H:i:s',
        ],
        'controller' => 'error',
        'action'     => 'index',
    ],
    'reCaptcha' => [
        'siteKey' => env('RECAPTCHA_KEY'),
        'secret' => env('RECAPTCHA_SECRET'),
    ]
]);
