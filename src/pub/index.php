<?php
declare(strict_types=1);

use Siarko\H2SCore\HttpScopeProvider;

if(version_compare(PHP_VERSION, '8.0') < 0){
    echo "this php version is too old: ".PHP_VERSION.", at least 8.2 is required";
    exit(0);
}

if(file_exists($GLOBALS['_composer_autoload_path'])){
    require $GLOBALS['_composer_autoload_path'];
}else{
    die("APPLICATION AUTOLOADER NOT FOUND!");
}

$projectRoot = dirname(dirname($GLOBALS['_composer_autoload_path']));

\Siarko\Profiler\Profiler::start();
\Siarko\Profiler\Profiler::start('BootstrapConfig');
\Siarko\Api\State\Scope\ScopeProviderRegistry::setProvider(HttpScopeProvider::class);
$bootstrap = new Siarko\Bootstrap\Bootstrap($projectRoot);
\Siarko\Profiler\Profiler::end();
\Siarko\Profiler\Profiler::start('BootstrapRun');
$bootstrap->run(\Siarko\ActionRouting\HttpApplication::class);
\Siarko\Profiler\Profiler::end();
\Siarko\Profiler\Profiler::end();