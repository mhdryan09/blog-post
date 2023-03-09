{{-- @dd($post); --}}

@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>

        {{-- {{ $post->body }} --}}

        {!! $post->body !!}
    </article>

    <a href="/posts">Bact To Post</a>
@endsection
