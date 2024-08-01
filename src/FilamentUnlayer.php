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

    protected ?string $displayMode = null;

    protected ?string $locale = null;

    public function mountHtmlStateTo(string $htmlStatePath): static
    {
        $this->htmlStatePath = $htmlStatePath;

        return $this;
    }

    public function getHtmlStatePath(): null|string
    {
        return $this->htmlStatePath;
    }

    public function displayMode(string $displayMode): static
    {
        $this->displayMode = $displayMode;

        return $this;
    }

    public function getDisplayMode(): null|string
    {
        return $this->displayMode;
    }

    public function locale(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getLocale(): null|string
    {
        return $this->locale;
    }
}
