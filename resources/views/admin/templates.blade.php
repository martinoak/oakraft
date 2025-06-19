@extends('layout')

@section('content')
<div>
    <x-admin-sidebar />

    <div class="lg:pl-72">
        <x-admin-header :title="'Seznam šablon'" />

        <main class="py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
                    @foreach($templates as $template)
                        <div class="relative flex items-center space-x-3 rounded-lg border border-gray-800 bg-white/20 px-6 py-5 shadow-xs">
                            <div class="min-w-0 flex-1">
                                <a href="{{ route('admin.templates.download', ['template' => $template]) }}" class="focus:outline-hidden">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-white">{{ $template }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
