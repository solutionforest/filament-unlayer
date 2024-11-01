<?php

namespace SolutionForest\FilamentUnlayer\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SolutionForest\FilamentUnlayer\FilamentUnlayer
 */
class FilamentUnlayer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \SolutionForest\FilamentUnlayer\FilamentUnlayer::class;
    }
}
