<?php

use SolutionForest\FilamentUnlayer\UnlayerExporter;

if (! function_exists('unlayerExporter')) {
    function unlayerExporter(): UnlayerExporter
    {
        return app(UnlayerExporter::class);
    }
}
