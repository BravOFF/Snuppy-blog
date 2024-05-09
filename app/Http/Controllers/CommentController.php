<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request, Article $article): RedirectResponse
    {
        $validatedData = $request->validated();
        $comment = new Comment($validatedData);
        $article->comments()->save($comment);

        return redirect()->route('articles.show', $article)->with('success', 'Комментарий добавлен успешно!');
    }
}
