<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    public function store(ArticleStoreRequest $request): RedirectResponse
    {
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail->store('/', 'thumbnails');

            $thumbnailPath = Storage::disk('thumbnails')->url($thumbnail->hashName());
        }

        $validatedData = $request->validated();
        $article = Article::create([
            'user_id' => auth()->id(),
            ...$validatedData,
            'thumbnail' => $thumbnailPath ?? null,
        ]);

        return redirect()->route('articles.show', $article)->with('success', 'Статья успешно создана!');
    }

    public function update(ArticleUpdateRequest $request, Article $article): RedirectResponse
    {
        $thumbnailPath = $article->thumbnail;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail->store('/', 'thumbnails');

            $thumbnailPath = Storage::disk('thumbnails')->url($thumbnail->hashName());
        }

        $validatedData = $request->validated();
        $article->update([
            ...$validatedData,
            'thumbnail' => $thumbnailPath ?? null,
        ]);

        return redirect()->route('articles.show', $article)->with('success', 'Статья успешно изменена!');
    }

    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return Redirect::to('/');
    }

}
