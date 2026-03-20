@extends('admin.portal')

@section('title', 'Manage Articles')
@section('header_title', 'Articles')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/40 overflow-hidden border border-gray-100">
        
        <!-- Header -->
        <div class="p-6 border-b border-gray-100 bg-white relative z-20">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Manage Articles</h3>
                    <p class="text-sm text-gray-500">Create, edit, or remove articles.</p>
                </div>
                <a href="{{ route('admin.articles.create') }}" 
                    class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-200 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 hover:-translate-y-0.5">
                    <i class="fa-solid fa-plus text-sm"></i> 
                    <span>Add Article</span>
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="relative z-10 overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                        <th class="px-6 py-4 first:pl-8">Article Info</th>
                        <th class="px-6 py-4">Source</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Published</th>
                        <th class="px-6 py-4 text-right last:pr-8">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($articles as $article)
                        <tr class="group transition-all duration-200 hover:shadow-[0_4px_20px_-2px_rgba(0,0,0,0.1)] hover:bg-white hover:-translate-y-[2px] relative hover:z-20">

                            <!-- Article Info -->
                            <td class="px-6 py-5 first:pl-8">
                                <div class="flex items-center gap-5">
                                    
                                    <div class="relative h-16 w-24 flex-shrink-0 rounded-xl overflow-hidden border border-gray-200/80 shadow-sm bg-gray-100">
                                        @if($article->thumbnail)
                                            <img src="{{ asset('storage/' . $article->thumbnail) }}" 
                                                class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                                alt="{{ $article->title }}">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-gray-400 bg-gray-50">
                                                <i class="fa-regular fa-image text-2xl opacity-50"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div>
                                        <div class="font-bold text-base text-gray-900 group-hover:text-teal-700 transition-colors">
                                            {{ $article->title }}
                                        </div>
                                        <div class="text-sm text-gray-500 mt-1 font-medium">
                                            {{ $article->slug }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Source -->
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold 
                                    {{ $article->source_type === 'editor' 
                                        ? 'bg-blue-50 text-blue-700 border border-blue-200/60' 
                                        : 'bg-purple-50 text-purple-700 border border-purple-200/60' }}">
                                    {{ strtoupper($article->source_type) }}
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-1.5 pl-2 pr-3 py-0.5 rounded-full text-xs font-bold uppercase tracking-wide 
                                    {{ $article->status === 'published' 
                                        ? 'bg-green-50 text-green-700 border border-green-200/60' 
                                        : 'bg-gray-100 text-gray-500 border border-gray-200' }}">
                                    <span class="w-1.5 h-1.5 rounded-full 
                                        {{ $article->status === 'published' ? 'bg-green-500' : 'bg-gray-400' }}">
                                    </span>
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>

                            <!-- Published Date -->
                            <td class="px-6 py-5 text-sm text-gray-600">
                                {{ optional($article->published_at)->format('Y-m-d H:i') ?? '-' }}
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-5 text-right last:pr-8">
                                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-200 transform group-hover:translate-x-0 translate-x-4">
                                    
                                    <a href="{{ route('admin.articles.edit', $article) }}" 
                                        class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-blue-600 hover:border-blue-300 hover:shadow-sm hover:bg-blue-50 transition"
                                        title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('admin.articles.destroy', $article) }}" 
                                        method="POST"
                                        onsubmit="return confirm('Delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-white border border-gray-200 rounded-lg text-gray-400 hover:text-red-600 hover:border-red-300 hover:shadow-sm hover:bg-red-50 transition"
                                            title="Delete">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>

                                </div>

                                <div class="block group-hover:hidden text-gray-300">
                                    <i class="fa-solid fa-ellipsis text-xl"></i>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center bg-gray-50/50 rounded-2xl p-8 border border-dashed border-gray-200">
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm border border-gray-100">
                                        <i class="fa-solid fa-newspaper text-3xl text-teal-600/80"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">No Articles Yet</h3>
                                    <p class="text-gray-500 mb-6 max-w-md mx-auto">
                                        Start building your expert insights by adding your first article.
                                    </p>
                                    <a href="{{ route('admin.articles.create') }}" 
                                        class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-xl font-medium transition shadow-md shadow-teal-600/20 hover:shadow-lg hover:-translate-y-0.5">
                                        <i class="fa-solid fa-plus"></i> Create Article
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="bg-white px-6 py-4 border-t border-gray-100">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
</div>
@endsection