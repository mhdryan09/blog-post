{{-- @dd($post); --}}

@extends('layouts.main')

@section('container')
    <article>
        <h2>{{ $post->title }}</h2>

        <p>By
            <a href="#" class="tex-decoration-none"> {{ $post->user->name }} </a> in
            <a href="/categories/{{ $post->category->slug }}" class="tex-decoration-none">
                {{ $post->category->name }}
            </a>
        </p>

        {!! $post->body !!}
    </article>

    <a href="/posts" class="d-block mt-3">Bact To Post</a>
@endsection
