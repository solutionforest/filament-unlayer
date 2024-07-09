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
                user: @json(config('filament-unlayer.user')),
                mergeTags: @json(config('filament-unlayer.mergeTags')),
                designTags: @json(config('filament-unlayer.designTags')),
                specialLinks: @json(config('filament-unlayer.specialLinks')),
                tools: @json(config('filament-unlayer.tools')),
                blocks: @json(config('filament-unlayer.blocks')),
                editor: @json(config('filament-unlayer.editor')),
                fonts: @json(config('filament-unlayer.fonts')),
                safeHtml: @json(config('filament-unlayer.safeHtml')),
                customJs: @json(config('filament-unlayer.customJs')),
                customCss: @json(config('filament-unlayer.customCss')),
                textDirection: '{{ config('filament-unlayer.textDirection') }}',
            })
    
            var load = (JSON.parse(JSON.stringify(this.state)))
            unlayer.loadDesign(load)
    
    
            unlayer.addEventListener('design:updated', function(updates) {
                unlayer.exportHtml(function(data) {
                    var json = data.design; // design json
                    var html = data.html;
                    var text = data.text; // final text
    
                    // Save the json, or html here
                    $data.setState(json)
                })
            })
    
            Livewire.hook('commit', ({ component, commit, succeed, fail, respond }) => {
                succeed(({ snapshot, effect }) => {
                    $nextTick(() => {
                        $data.saveEditor()
                    })
                })
            })
    
        },
    
        setState: function(state) {
            this.state = state
            @this.set('{{ $getStatePath() }}', this.state)
        },
    
        saveEditor: function() {
            unlayer.saveDesign(function(design) {
                console.log(design)
                this.state = design
            })
        },
    
        exportHtml: function() {
            unlayer.exportHtml(function(data) {
                var html = data.html;
            })
        },
    
        exportPlainText: function() {
            unlayer.exportPlainText(function(data) {
                var text = data.text;
            })
        },
    
        exportImage: function() {
            unlayer.exportImage(function(data) {
                var imageUrl = data.url;
            })
        },
    
        exportPdf: function() {
            unlayer.exportPdf(function(data) {
                var pdfUrl = data.url;
            })
        },
    
        exportZip: function() {
            unlayer.exportZip(function(data) {
                var fileUrl = data.url;
            })
        }
    }" x-load-js="[@js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('unlayer'))]"
        x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('filament-unlayer-styles', package: 'solutionforest/filament-unlayer'))]" x-init="initEditor()">

        <div class="filament-unlayer-editor">
            <div id="editor-container">

            </div>
        </div>

    </div>

</x-filament-forms::field-wrapper>
