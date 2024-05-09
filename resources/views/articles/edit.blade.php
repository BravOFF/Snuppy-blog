<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">{{ __('articles.create') }}</h2>
                    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="title"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('articles.placeholder_title') }}</label>
                            <input type="text" name="title" id="title"
                                   value="{{ $article->title }}"
                                   class="mt-1 p-2 rounded w-full dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                   placeholder="{{ __('articles.placeholder_title') }}">
                        </div>
                        <div class="mb-4">
                            <label for="content"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('articles.placeholder_content') }}</label>
                            <textarea name="content" id="content" rows="15"
                                      class="mt-1 p-2 rounded w-full dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                      placeholder="{{ __('articles.placeholder_content') }}">
                                {{ $article->content }}
                            </textarea>
                        </div>
                        <div class="mb-4">
                            <label for="thumbnail"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('articles.placeholder_thumbnail') }}</label>
                            <input type="file" name="thumbnail" id="thumbnail"
                                   class="mt-1 p-2 rounded w-full dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                            <p class="mt-2 text-sm text-gray-200">
                                {{ __('articles.old_thumbnail') }}: <a href="{{ $article->thumbnail }}" target="_blank">{{ $article->thumbnail }}</a>
                            </p>
                        </div>
                        <div class="mb-4">
                            <label for="published_at"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('articles.placeholder_published_at') }}</label>
                            <input type="datetime-local" name="published_at" id="published_at"
                                   value="{{ $article->published_at }}"
                                   class="mt-1 p-2 rounded w-full dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800">
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                    class="px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ __('articles.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
