<?php

namespace SolutionForest\FilamentUnlayer;

use Closure;
use Filament\Forms\Components\Concerns\HasState;
use Filament\Forms\Components\Field;

class FilamentUnlayer extends Field
{
    use HasState;

    protected string $view = 'filament-unlayer::filament-unlayer';

    public string $exportTo = '';

    public function exportTo(string $exportTo): self
    {
        $this->exportTo = $exportTo;

        return $this;
    }

    public function getHtmlStatePath(): string
    {
        return 'html.' . $this->statePath;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->default([]);

        $this->afterStateHydrated(static function ($component, $state) {
            if (is_array($state)) {
                return;
            }

            $component->state([]);
        });

    }
}
