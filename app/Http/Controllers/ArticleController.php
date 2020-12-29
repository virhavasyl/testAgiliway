<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\DeleteArticleRequest;
use App\Http\Requests\Article\EditArticleRequest;
use App\Http\Requests\Article\ShowArticleRequest;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    const ARTICLES_PER_PAGE = 10;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::select('id', 'title', 'description')->orderBy('created_at', 'desc')->paginate(self::ARTICLES_PER_PAGE);

        return view('pages.article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     * @return Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Article::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'text' => $request->input('text')
        ]);

        return redirect('article')->with('success', trans('form.result.success-created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ShowArticleRequest $request
     * @param int $id
     * @return Response
     */
    public function show(ShowArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        return view('pages.article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EditArticleRequest $request
     * @param int $id
     * @return Response
     */
    public function edit(EditArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        return view('pages.article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $article = Article::find($id);

        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->text = $request->input('text');

        $article->save();

        return redirect()->route('article.index')->with('success', trans('form.result.success-updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteArticleRequest $request
     * @param int $id
     * @return void
     */
    public function destroy(DeleteArticleRequest $request, $id)
    {
        Article::findOrFail($id)->delete();

        return redirect()->route('article.index')->with('success', trans('form.result.success-deleted'));
    }
}
