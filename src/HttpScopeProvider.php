<?php

declare(strict_types=1);

namespace Siarko\H2SCore;

use Siarko\Api\State\Scope\ScopeProviderInterface;

class HttpScopeProvider implements ScopeProviderInterface
{

    public const SCOPE_FRONTEND = 'frontend';

    /**
     * @return ?string
     */
    public function getScope(): ?string
    {
        return self::SCOPE_FRONTEND;
    }
}