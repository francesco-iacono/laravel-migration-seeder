<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("articles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate(
            [
                'title'  => 'required|max:100',
                'subtitle' => 'required|max:100',
                'author' => 'required|max:40',
                'genre' => 'required|max:15'
        ]);

        $article = new Article();
        $article->fill($data);
        $result = $article->save();

        $newArticle = Article::orderBy('id', 'DESC')->first();
        return redirect()->route('articles.show', $newArticle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->all();
        $request->validate(
        [
            'title'  => 'required|max:100',
            'subtitle' => 'required|max:100',
            'author' => 'required|max:40',
            'genre' => 'required|max:15'
        ]);

        $article->update($data);
        /* dd($article); */
        return redirect()
        ->route('articles.index')
        ->with('message', 'Il tuo articolo '. $article->title .  ' è stata modificata correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        /* dd($article); */
        return redirect()
        ->route('articles.index')
        ->with('message', 'L\'articlolo '. $article->title .  ' è stata cancellata correttamente!');
    }
}
