<?php

namespace SolutionForest\FilamentUnlayer;

use Closure;
use Filament\Forms\Components\Concerns\HasState;
use Filament\Forms\Components\Field;

class FilamentUnlayer extends Field
{
    use HasState;

    protected string $view = 'filament-unlayer::filament-unlayer';

    protected function setUp(): void
    {
        parent::setUp();

        $this->default([
            'design' => [],
            'html' => ''
        ]);
        
    }
}
