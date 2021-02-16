@extends('layouts.app')

@section('main')
  <h1 class="mt-5">Articoli</h1>

  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>   
  @endif

  <table class="table table-light table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Titolo</th>
        <th>Sottotitolo</th>
        <th>Autore</th>
        <th>Testo</th>
        <th>Immagine</th>
        <th>Genere</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articles as $article)
        <tr>
          <td>{{ $article->id }}</td>
          <td>{{ substr($article->title, 0, 30) }}</td>
          <td>{{ substr($article->subtitle, 0, 30) }}</td>
          <td>{{ $article->author }}</td>
          <td>{{ substr($article->text, 0, 30) }}</td>
          <td>{{ $article->img_path }}</td>
          <td>{{ $article->genre }}</td>
          <td>{{ $article->created_at }}</td>
          <td>{{ $article->updated_at }}</td>
          <td>
            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-dark"> <i class="fas fa-search-plus"></i></a>
          </td>
          <td>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-dark"> <i class="fas fa-pen"></i> </a>
          </td>
          <td>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-dark">
                <i class="fas fa-trash-alt"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table> 
  <div class="text-right">
    <a href="{{ route('articles.create') }}" class="btn btn-lg btn-primary">Nuova birra</a>
  </div>   
@endsection