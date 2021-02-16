@extends('layouts.app')

@section('main')
<div class="container">
  <h1 class="mt-5">Dettaglio articolo {{ $article->title }}</h1>
  <table class="table table-light table-striped table-bordered">
    @foreach ($article->getAttributes() as $key => $value)
    <tr>
      <td><strong>{{ $key }}</strong></td>
      <td>{{ $value }}</td>
    </tr>
        
    @endforeach
  </table>
  <div class="text-right">
    <a href="{{ route('articles.index') }}" class="btn btn-lg btn-primary">Torna agli articoli</a>
  </div>
</div>
@endsection