<x-filament-forms::field-wrapper :id="$getId()" :label="$getLabel()" :label-sr-only="$isLabelHidden()" :helper-text="$getHelperText()"
    :hint="$getHint()" :hint-icon="$getHintIcon()" :required="$isRequired()" :state-path="$getStatePath()">

    <div class="panel__top">
        <div class="panel__basic-actions"></div>
    </div>

    <div wire:ignore class="filament-unlayer" x-data="{
        html: {{ $getHtmlStatePath() ? '$wire.' . $applyStateBindingModifiers('entangle(\'' . $getHtmlStatePath() . '\')') : 'null' }},
        state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
        statePath: '{{ $getStatePath() }}',
        htmlStatePath: '{{ $getHtmlStatePath() }}',
        customUpload: '{{ config('filament-unlayer.customUpload') }}',
    
        initEditor: function() {
    
            unlayer.init({
                id: 'editor-container',
                displayMode: '{{ $getDisplayMode() ?? config('filament-unlayer.displayMode') }}',
                locale: '{{ $getLocale() ?? config('filament-unlayer.locale') }}',
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
    
            if (typeof this.state === 'string') {
                var load = JSON.parse(this.state);
            } else {
                var load = JSON.parse(JSON.stringify(this.state))
            }
    
            if (load && load.design) {
                unlayer.loadDesign(load.design);
            }
    
            if (this.customUpload) {
                unlayer.registerCallback('image', function(file, done) {
                    var data = new FormData()
                    data.append('file', file.attachments[0])
    
                    fetch('{{ config('filament-unlayer.upload.url') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: data
                    }).then(response => {
                        // Make sure the response was valid
                        if (response.status >= 200 && response.status < 300) {
                            return response
                        } else {
                            var error = new Error(response.statusText)
                            error.response = response
                            throw error
                        }
                    }).then(response => {
                        return response.json()
                    }).then(data => {
                        // Pass the URL back to Unlayer to mark this upload as completed
                        done({ progress: 100, url: data.file.url })
                    })
                })
            }
    
            unlayer.addEventListener('design:updated', function(updates) {
                unlayer.exportHtml(function(data) {
                    var design = data.design; // design json
                    var html = data.html; // HTML string
                    $data.setState(design, html)
                })
            })
    
        },
    
        setState: function(design, html) {
            this.state = {
                design: design,
                html: html
            }
            @this.set('{{ $getStatePath() }}', this.state)
            if ($data.htmlStatePath.length > 0) {
                @this.set('{{ $getHtmlStatePath() }}', html)
            }
        },
    
    }" x-load-js="[@js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('unlayer'))]"
        x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('filament-unlayer-styles', package: 'solutionforest/filament-unlayer'))]" x-init="initEditor()">

        <div class="filament-unlayer-editor">
            <div id="editor-container">

            </div>
        </div>

    </div>

</x-filament-forms::field-wrapper>
