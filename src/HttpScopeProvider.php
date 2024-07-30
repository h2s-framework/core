<?php

declare(strict_types=1);

namespace Siarko\H2SCore;

use Siarko\Api\State\Scope\ScopeProviderInterface;
use Siarko\UrlService\UrlProvider;

class HttpScopeProvider implements ScopeProviderInterface
{

    public const SCOPE_ADMIN = 'admin';
    public const SCOPE_FRONTEND = 'frontend';

    /**
     * @param UrlProvider $urlProvider
     */
    public function __construct(
        private readonly \Siarko\UrlService\UrlProvider $urlProvider
    )
    {
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        $suffix = $this->urlProvider->getSuffix();
        if(str_starts_with($suffix, self::SCOPE_ADMIN)){
            return self::SCOPE_ADMIN;
        }
        return self::SCOPE_FRONTEND;
    }
}