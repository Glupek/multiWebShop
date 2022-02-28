@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Gastenboek</h1>
    <hr>
    @foreach ($posts as $post )
    <article>
        <h3>
            <a href="/posts/{{ $post->id }}">
            {{ $post->title }}</a>
        </h3>
        <div>
            {{ $post->excerpt }}
        </div>
    </article>
        
    @endforeach
<hr>
</div>

@endsection