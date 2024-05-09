<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-bold mb-4">{{ __('articles.title') }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2 gap-2">
            @forelse ($articles as $article)
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                    <h3 class="text-lg font-semibold">{{ $article->title }}</h3>
                    <p class="text-sm overflow-hidden line-clamp-3">{{ substr($article->content, 0, 200) }}{{ strlen($article->content) > 200 ? '...' : '' }}</p>
                    @if ($article->thumbnail)
                        <img src="{{ $article->thumbnail }}" alt="Article Thumbnail" class="mt-4 rounded-lg w-full max-h-52 object-cover">
                    @endif
                    <div class="text-right mt-4">
                        <a
                            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            href="{{ route('articles.show', $article) }}">
                            {{ __('articles.read_more') }}
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-sm">{{ __('general.no_data') }}</p>
            @endforelse
        </div>
    </div>
</div>
