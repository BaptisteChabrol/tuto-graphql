<?php

namespace App\Resolver;

use ApiPlatform\GraphQl\Resolver\QueryCollectionResolverInterface;

final class ArticleItemResolver implements QueryCollectionResolverInterface
{

    public function __invoke(iterable $collection, array $context): iterable
    {
        return $collection;
    }
}
