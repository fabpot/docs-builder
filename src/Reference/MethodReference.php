<?php

namespace SymfonyDocs\Reference;

use Doctrine\RST\Environment;
use Doctrine\RST\Reference;
use Doctrine\RST\References\ResolvedReference;

class MethodReference extends Reference
{
    private const BASE__URL = 'https://api.symfony.com';

    public function getName(): string
    {
        return 'method';
    }

    public function resolve(Environment $environment, string $data): ResolvedReference
    {
        $className = explode('::', $data)[0];
        $className = str_replace('\\\\', '\\', $className);

        $methodName = explode('::', $data)[1];

        return new ResolvedReference(
            $methodName.'()',
            sprintf('%s/%s/%s.html#method_%s', self::BASE__URL, '4.1', str_replace('\\', '/', $className), $methodName)
        );
    }
}