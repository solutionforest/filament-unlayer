<?php

namespace SolutionForest\FilamentUnlayer;

use Closure;
use Filament\Forms\Components\Concerns\HasState;
use Filament\Forms\Components\Field;

class FilamentUnlayer extends Field
{
    use HasState;

    protected string $view = 'filament-unlayer::filament-unlayer';

    protected ?string $htmlStatePath = null;

    public function mountHtmlStateTo(string $htmlStatePath): static
    {
        $this->htmlStatePath = $htmlStatePath;

        return $this;
    }

    public function getHtmlStatePath(): null|string
    {
        return $this->htmlStatePath;
    }
}
