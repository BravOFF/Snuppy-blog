<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @auth
                        <div class="float-right">
                            <x-danger-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            >{{ __('general.delete.button') }}</x-danger-button>

                            <a href="{{ route('articles.edit', $article) }}"
                               class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('general.edit') }}
                            </a>

                            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('articles.destroy', $article) }}" class="p-6">
                                    @csrf
                                    @method('delete')

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('general.delete.sure') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('general.delete.text') }}
                                    </p>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('general.cancel') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('general.delete.button') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                        </div>
                    @endauth

                    @if (session('success'))
                        <div class="my-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md"
                             role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <h2 class="text-2xl font-bold mb-4">{{ $article->title }}</h2>

                    @if ($article->thumbnail)
                        <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}"
                             class="mb-4 rounded-lg w-full max-h-96 object-cover">
                    @endif

                    <p class="text-sm mb-4">{{ $article->created_at->format('F j, Y') }}</p>
                    <p class="mb-4">{{ $article->content }}</p>
                    <h3 class="text-lg font-semibold mb-2">{{ __('comments.title') }}</h3>

                    @forelse ($article->comments as $comment)
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 mb-2">
                            <p class="text-sm">{{ $comment->content }}</p>
                            <p class="text-xs text-gray-300">{{ __('comments.posted_by', ['name' => $comment->name, 'date' => $comment->created_at->diffForHumans()]) }}</p>
                        </div>
                    @empty
                        <p class="text-sm">{{ __('comments.no_comments') }}</p>
                    @endforelse

                    <form action="{{ route('comment.store', $article) }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="mb-4">
                            <input type="text" name="name" id="name"
                                   class="rounded w-full dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                   placeholder="{{ __('comments.name_placeholder') }}">
                        </div>
                        <textarea name="content"
                                  class="rounded w-full dark:bg-gray-900 border-gray-300 dark:border-gray-700 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                  placeholder="{{ __('comments.write_comment') }}"></textarea>
                        <button type="submit"
                                class="mt-2 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ __('comments.submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
