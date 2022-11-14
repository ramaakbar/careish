<div wire:ignore>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    <input id="{{ $trixId }}" type="hidden" name="content" value="{{ $value }}">
    <trix-editor wire:ignore input="{{ $trixId }}"></trix-editor>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <script>
        var trixEditor = document.getElementById("{{ $trixId }}")
        var mimeTypes = ["image/png", "image/jpeg", "image/jpg"];

        addEventListener("trix-blur", function(event) {
            @this.set('value', trixEditor.getAttribute('value'))
        });

        addEventListener("trix-file-accept", function(event) {
            if (!mimeTypes.includes(event.file.type)) {
                return event.preventDefault();
            }
        });

        addEventListener("trix-attachment-add", function(event) {
            uploadTrixImage(event.attachment);
        });

        function uploadTrixImage(attachment) {
            @this.upload(
                'photos',
                attachment.file,
                function(uploadedURL) {
                    const trixUploadCompletedEvent = `trix-upload-completed:${btoa(uploadedURL)}`;
                    const trixUploadCompletedListener = function(event) {
                        attachment.setAttributes(event.detail);
                        window.removeEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);
                    }

                    window.addEventListener(trixUploadCompletedEvent, trixUploadCompletedListener);

                    @this.call('completeUpload', uploadedURL, trixUploadCompletedEvent);
                },
                function() {},
                function(event) {
                    attachment.setUploadProgress(event.detail.progress);
                },
            )
        }
    </script>
</div>
