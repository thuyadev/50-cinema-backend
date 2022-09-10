@extends('layouts.main')

@section('content')
    <x-page-header-only>Create blog</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="title" name="title" aria-describedby="title_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('title')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="title" class="absolute text-gray-300 text-sm @error('title')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="title_error_help" class="@error('title')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <select name="status" id="status" aria-describedby="status_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('status')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    <option value="1">News</option>
                                    <option value="2">Events</option>
                                    <option value="3">Activity</option>
                                </select>
                                <label for="status" class="absolute text-gray-300 text-sm @error('status')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="status_error_help" class="@error('status')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="Address" class="text-gray-300 text-sm mb-3">Description</label><span class="text-red-700 text-sm ml-1">*</span>
                        <textarea name="description" id="editor"></textarea>
                        <p class="@error('description')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-xs text-red-600 dark:text-red-400">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                </div>

                <div class="mt-5 dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="small_size">Banner Image</label>
                    <input name="image" class="block w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" type="file">
                    <p class="@error('image')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-xs text-red-600 dark:text-red-400">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="flex">
                    <x-button class="mt-5 mr-2">Create</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('blogs.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ now() }}" />
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script>

    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'specialCharacters',
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Welcome ...',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [
                    {
                        marker: '@',
                        feed: [
                            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                            '@sugar', '@sweet', '@topping', '@wafer'
                        ],
                        minimumCharacters: 1
                    }
                ]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType
                'MathType'
            ]
        });
    </script>
@endsection
