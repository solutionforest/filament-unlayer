<x-filament-forms::field-wrapper :id="$getId()" :label="$getLabel()" :label-sr-only="$isLabelHidden()" :helper-text="$getHelperText()"
    :hint="$getHint()" :hint-icon="$getHintIcon()" :required="$isRequired()" :state-path="$getStatePath()">

    <div class="panel__top">
        <div class="panel__basic-actions"></div>
    </div>

    <div wire:ignore class="filament-unlayer" x-data="{
        state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
        statePath: '{{ $getStatePath() }}',
    
        initEditor: function() {
    
            unlayer.init({
                id: 'editor-container',
                projectId: 1,
                displayMode: '{{ config('filament-unlayer.displayMode') }}',
                locale: '{{ config('filament-unlayer.locale') }}',
                appearance: @js(config('filament-unlayer.appearance')),
                user: {{ json_encode(config('filament-unlayer.user')) }},
                mergeTags: {{ json_encode(config('filament-unlayer.mergeTags')) }},
                designTags: {{ json_encode(config('filament-unlayer.designTags')) }},
                specialLinks: {{ json_encode(config('filament-unlayer.specialLinks')) }},
                tools: {{ json_encode(config('filament-unlayer.tools')) }},
                blocks: {{ json_encode(config('filament-unlayer.blocks')) }},
                editor: {{ json_encode(config('filament-unlayer.editor')) }},
                fonts: {{ json_encode(config('filament-unlayer.fonts')) }},
                safeHtml: {{ json_encode(config('filament-unlayer.safeHtml')) }},
                customJs: {{ json_encode(config('filament-unlayer.customJs')) }},
                customCss: {{ json_encode(config('filament-unlayer.customCss')) }},
                textDirection: '{{ config('filament-unlayer.textDirection') }}',
            })
    
            unlayer.setBodyValues()
    
            var load = (JSON.parse(JSON.stringify(this.state)))
            unlayer.loadDesign(load)
    
    
            unlayer.addEventListener('design:updated', function(updates) {
                unlayer.exportHtml(function(data) {
                    var json = data.design; // design json
                    $data.setState(json)
                    $data.saveHtml()
                })
            })
    
    
        },
    
        saveHtml: function() {
            unlayer.exportHtml(function(data) {
                $wire.dispatch('saveHtml', {
                    html: data.html
                })
            })
        },
    
        setState: function(state) {
            this.state = state
            @this.set('{{ $getStatePath() }}', this.state)
        },
    
    }" wire:callSaveHtml="saveHtml"
        x-load-js="[@js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('unlayer'))]" x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('filament-unlayer-styles', package: 'solutionforest/filament-unlayer'))]" x-init="initEditor()">

        <div class="filament-unlayer-editor">
            <div id="editor-container">

            </div>
        </div>

        <div x-text="htmlstate" id="htmlstate" class="hidden"></div>

    </div>

</x-filament-forms::field-wrapper>
