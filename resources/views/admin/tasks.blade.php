@extends('layout')

@section('content')
<div>
    <x-admin-sidebar />

    <div class="lg:pl-72">
        <div class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-800 bg-black/30 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
            <button type="button" class="-m-2.5 p-2.5 text-white lg:hidden">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div class="h-6 w-px bg-white/10 lg:hidden" aria-hidden="true"></div>

            <div class="flex flex-1 items-center gap-x-4 self-stretch lg:gap-x-6">
                <div class="flex flex-1">
                    <h1 class="text-2xl font-bold text-white">Seznam úkolů</h1>
                </div>
            </div>
        </div>

        <main class="py-6">
            <form method="post" action="{{ route('admin.tasks.save') }}" class="px-4 sm:px-6 lg:px-8" id="tasks-form">
                @csrf
                <!-- Tiptap -->
                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                    <div id="hs-editor-tiptap">
                        <div class="sticky top-0 bg-white flex align-middle gap-x-0.5 border-b border-gray-200 p-2 dark:bg-neutral-900 dark:border-neutral-700">
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-heading="1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 576 512">
                                    <path d="M48 88c0-13.3-10.7-24-24-24S0 74.7 0 88L0 248 0 424c0 13.3 10.7 24 24 24s24-10.7 24-24l0-152 224 0 0 152c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176 0-160c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 136L48 224 48 88zm456 0c0-8.5-4.5-16.4-11.8-20.7s-16.4-4.4-23.8-.3l-72 40c-11.6 6.4-15.8 21-9.3 32.6s21 15.8 32.6 9.3L456 128.8 456 400l-48 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l72 0 72 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0 0-312z"/>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-heading="2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 640 512">
                                    <path d="M48 88c0-13.3-10.7-24-24-24S0 74.7 0 88L0 248 0 424c0 13.3 10.7 24 24 24s24-10.7 24-24l0-152 224 0 0 152c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176 0-160c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 136L48 224 48 88zm397.3 40.8C457.9 118 474 112 490.7 112l9.2 0c42.1 0 76.2 34.1 76.2 76.2c0 21.3-8.9 41.5-24.5 56L375.7 406.4c-7.3 6.7-9.7 17.2-6.1 26.4s12.5 15.3 22.4 15.3l224 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-162.6 0L584.1 279.4c25.5-23.5 39.9-56.6 39.9-91.2C624 119.6 568.4 64 499.8 64l-9.2 0c-28.1 0-55.3 10.1-76.6 28.3l-29.7 25.4c-10.1 8.6-11.2 23.8-2.6 33.8s23.8 11.2 33.8 2.6l29.7-25.4z"/>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-heading="3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 640 512"><path d="M48 88c0-13.3-10.7-24-24-24S0 74.7 0 88L0 248 0 424c0 13.3 10.7 24 24 24s24-10.7 24-24l0-152 224 0 0 152c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176 0-160c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 136L48 224 48 88zM400 64c-13.3 0-24 10.7-24 24s10.7 24 24 24l142.1 0L423 231c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8l88 0c35.3 0 64 28.7 64 64s-28.7 64-64 64l-72.6 0c-15.6 0-29-11.3-31.6-26.7l-.2-1.2c-2.2-13.1-14.5-21.9-27.6-19.7s-21.9 14.5-19.7 27.6l.2 1.2c6.4 38.6 39.8 66.8 78.9 66.8l72.6 0c61.9 0 112-50.1 112-112s-50.1-112-112-112l-30.1 0L617 105c6.9-6.9 8.9-17.2 5.2-26.2S609.7 64 600 64L400 64z"/>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-bold="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 12a4 4 0 0 0 0-8H6v8"></path>
                                    <path d="M15 20a4 4 0 0 0 0-8H6v8Z"></path>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-italic="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="19" x2="10" y1="4" y2="4"></line>
                                    <line x1="14" x2="5" y1="20" y2="20"></line>
                                    <line x1="15" x2="9" y1="4" y2="20"></line>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-underline="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M6 4v6a6 6 0 0 0 12 0V4"></path>
                                    <line x1="4" x2="20" y1="20" y2="20"></line>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-strike="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 4H9a3 3 0 0 0-2.83 4"></path>
                                    <path d="M14 12a4 4 0 0 1 0 8H6"></path>
                                    <line x1="4" x2="20" y1="12" y2="12"></line>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-link="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-ol="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="10" x2="21" y1="6" y2="6"></line>
                                    <line x1="10" x2="21" y1="12" y2="12"></line>
                                    <line x1="10" x2="21" y1="18" y2="18"></line>
                                    <path d="M4 6h1v4"></path>
                                    <path d="M4 10h2"></path>
                                    <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-ul="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="8" x2="21" y1="6" y2="6"></line>
                                    <line x1="8" x2="21" y1="12" y2="12"></line>
                                    <line x1="8" x2="21" y1="18" y2="18"></line>
                                    <line x1="3" x2="3.01" y1="6" y2="6"></line>
                                    <line x1="3" x2="3.01" y1="12" y2="12"></line>
                                    <line x1="3" x2="3.01" y1="18" y2="18"></line>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-blockquote="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 6H3"></path>
                                    <path d="M21 12H8"></path>
                                    <path d="M21 18H8"></path>
                                    <path d="M3 12v6"></path>
                                </svg>
                            </button>
                            <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-white hover:bg-neutral-700 focus:bg-neutral-700" type="button" data-hs-editor-code="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 16 4-4-4-4"></path>
                                    <path d="m6 8-4 4 4 4"></path>
                                    <path d="m14.5 4-5 16"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="h-[75vh] overflow-auto text-white!" data-hs-editor-field=""></div>
                    </div>
                </div>
                <input type="hidden" name="tasks" id="tasks-input" value="{{ old('tasks', $tasks) }}">
                <div class="mt-4 flex justify-end space-x-4">
                    <button type="submit" class="button">Uložit</button>
                </div>
            </form>

        </main>
    </div>
</div>
@endsection

@section('scripts')
    <script type="module">
        import { Editor } from 'https://esm.sh/@tiptap/core@2.11.0';
        import StarterKit from 'https://esm.sh/@tiptap/starter-kit@2.11.0';
        import Placeholder from 'https://esm.sh/@tiptap/extension-placeholder@2.11.0';
        import Paragraph from 'https://esm.sh/@tiptap/extension-paragraph@2.11.0';
        import Bold from 'https://esm.sh/@tiptap/extension-bold@2.11.0';
        import Underline from 'https://esm.sh/@tiptap/extension-underline@2.11.0';
        import Link from 'https://esm.sh/@tiptap/extension-link@2.11.0';
        import BulletList from 'https://esm.sh/@tiptap/extension-bullet-list@2.11.0';
        import OrderedList from 'https://esm.sh/@tiptap/extension-ordered-list@2.11.0';
        import ListItem from 'https://esm.sh/@tiptap/extension-list-item@2.11.0';
        import Blockquote from 'https://esm.sh/@tiptap/extension-blockquote@2.11.0';
        import Heading from 'https://esm.sh/@tiptap/extension-heading@2.11.0';

        const editor = new Editor({
            element: document.querySelector('#hs-editor-tiptap [data-hs-editor-field]'),
            content: document.getElementById('tasks-input').value, // Prefill with saved notes
            editorProps: {
                attributes: {
                    class: 'relative h-[75vh] p-3'
                }
            },
            extensions: [
                StarterKit.configure({
                    history: false
                }),
                Heading.configure({
                    levels: [1, 2, 3],
                    HTMLAttributes: {
                        class: 'tiptap'
                    }
                }),
                Placeholder.configure({
                    placeholder: 'A jsme bez práce.',
                    emptyNodeClass: 'before:text-gray-500'
                }),
                Paragraph.configure({
                    HTMLAttributes: {
                        class: 'text-inherit text-white'
                    }
                }),
                Bold.configure({
                    HTMLAttributes: {
                        class: 'font-bold'
                    }
                }),
                Underline,
                Link.configure({
                    HTMLAttributes: {
                        class: 'inline-flex items-center gap-x-1 text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-white'
                    }
                }),
                BulletList.configure({
                    HTMLAttributes: {
                        class: 'list-disc list-inside text-white'
                    }
                }),
                OrderedList.configure({
                    HTMLAttributes: {
                        class: 'list-decimal list-inside text-white'
                    }
                }),
                ListItem.configure({
                    HTMLAttributes: {
                        class: 'marker:text-sm'
                    }
                }),
                Blockquote.configure({
                    HTMLAttributes: {
                        class: 'relative border-s-4 ps-4 sm:ps-6 dark:border-neutral-700 sm:[&>p]:text-lg'
                    }
                })
            ]
        });
        const actions = [
            {
                id: '#hs-editor-tiptap [data-hs-editor-heading="1"]',
                fn: () => editor.chain().focus().toggleHeading({ level: 1 }).run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-heading="2"]',
                fn: () => editor.chain().focus().toggleHeading({ level: 2 }).run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-heading="3"]',
                fn: () => editor.chain().focus().toggleHeading({ level: 3 }).run()

            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-bold]',
                fn: () => editor.chain().focus().toggleBold().run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-italic]',
                fn: () => editor.chain().focus().toggleItalic().run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-underline]',
                fn: () => editor.chain().focus().toggleUnderline().run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-strike]',
                fn: () => editor.chain().focus().toggleStrike().run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-link]',
                fn: () => {
                    const url = window.prompt('URL');
                    editor.chain().focus().extendMarkRange('link').setLink({ href: url }).run();
                }
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-ol]',
                fn: () => editor.chain().focus().toggleOrderedList().run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-ul]',
                fn: () => editor.chain().focus().toggleBulletList().run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-blockquote]',
                fn: () => editor.chain().focus().toggleBlockquote().run()
            },
            {
                id: '#hs-editor-tiptap [data-hs-editor-code]',
                fn: () => editor.chain().focus().toggleCode().run()
            }
        ];

        actions.forEach(({ id, fn }) => {
            const action = document.querySelector(id);

            if (action === null) return;

            action.addEventListener('click', fn);
        });
        // Add this to sync editor content to hidden input before submit
        document.getElementById('tasks-form').addEventListener('submit', function(e) {
            document.getElementById('tasks-input').value = editor.getHTML();
        });
    </script>
@endsection
