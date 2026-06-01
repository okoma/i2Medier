<div
    x-data="window.i2EditorJsField({
        holderId: @js('blog-content-editorjs'),
        isDisabled: false,
        placeholder: @js('Start writing your post... Press / for blocks.'),
        state: $wire.entangle(@js($statePath)),
    })"
    x-init="boot()"
    class="i2-editorjs-field"
>
    <div class="i2-editorjs-shell" wire:ignore>
  
        <div x-ref="holder" :id="holderId" class="i2-editorjs-holder"></div>
    </div>
</div>
