<?php

namespace SolutionForest\FilamentUnlayer\Commands;

use Illuminate\Console\Command;

class FilamentUnlayerCommand extends Command
{
    public $signature = 'filament-unlayer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
