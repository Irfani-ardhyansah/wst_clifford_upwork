@extends('admin.portal')

@section('title', 'Create Event')
@section('header_title', 'Create Event')

@section('content')
<div class="max-w-4xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[var(--text-1)]"></h1>
        <a href="{{ route('admin.events.index') }}" class="text-[var(--text-3)] hover:text-[var(--text-1)]">&larr; Back</a>
    </div>

    <div class="bg-[var(--surface)] rounded-xl shadow border border-[var(--border)] p-6">
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <div class="flex items-start gap-3">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 mt-0.5"></i>
                    <div>
                        <p class="font-semibold text-red-700 text-sm">
                            Please fix the following errors:
                        </p>
                        <ul class="mt-2 list-disc list-inside text-sm text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.events._form')
        </form>
    </div>
</div>

@endsection
