@extends('admin.portal')

@section('title', 'Dashboard')
@section('header_title', 'Admin Dashboard')

@section('content')

    {{-- Welcome --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">
            Welcome back, {{ auth()->user()->name ?? 'Admin' }}
        </h2>
        <p class="text-gray-500">
            Here’s a quick overview of your content and activity.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-400 uppercase tracking-wide">Case Studies</span>
                <i class="fa-solid fa-briefcase text-teal-500"></i>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $stats['case_studies'] ?? 0 }}</p>
            <p class="text-xs text-gray-400 mt-1">Total published</p>
        </div>

        <!-- <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-400 uppercase tracking-wide">White Papers</span>
                <i class="fa-solid fa-file-lines text-indigo-500"></i>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $stats['white_papers'] ?? 0 }}</p>
            <p class="text-xs text-gray-400 mt-1">Available resources</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-400 uppercase tracking-wide">Companies</span>
                <i class="fa-solid fa-building text-amber-500"></i>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $stats['companies'] ?? 0 }}</p>
            <p class="text-xs text-gray-400 mt-1">Registered</p>
        </div> -->

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-gray-400 uppercase tracking-wide">Admins</span>
                <i class="fa-solid fa-user-shield text-red-500"></i>
            </div>
            <p class="text-3xl font-bold text-gray-800">{{ $stats['admins'] ?? 1 }}</p>
            <p class="text-xs text-gray-400 mt-1">Active users</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('admin.case-studies') }}"
           class="group bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:border-teal-500 transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-teal-100 text-teal-600 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-lg group-hover:text-teal-600 transition">
                        Manage Case Studies
                    </h3>
                    <p class="text-sm text-gray-500">
                        Add, edit, or review premium case studies.
                    </p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.white-papers') }}"
           class="group bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:border-indigo-500 transition">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl">
                    <i class="fa-solid fa-file-lines"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-lg group-hover:text-indigo-600 transition">
                        Manage White Papers
                    </h3>
                    <p class="text-sm text-gray-500">
                        Upload and organize research documents.
                    </p>
                </div>
            </div>
        </a>
    </div>

@endsection
