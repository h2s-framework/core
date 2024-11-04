<?php

\Siarko\DependencyManager\Config\Init\BootConfiguration::register([
    \Siarko\DependencyManager\Config\DMKeys::ARGUMENTS => [
        \Siarko\Api\State\Scope\ScopeProviderRegistry::class => [
            'scopeProviders' => [
                'Core' => \Siarko\H2SCore\HttpScopeProvider::class
            ]
        ]
    ]
]);