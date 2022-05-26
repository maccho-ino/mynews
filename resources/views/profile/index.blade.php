@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="name">
                                    {{ \Str::limit('【名前】' . $post->name, 40) }}
                                </div>
                                <div class="gender">
                                    {{ \Str::limit('【性別】' . $post->gender, 40) }}
                                </div>
                                <div class="hobby">
                                    {{ \Str::limit('【趣味】' . $post->hobby, 60) }}
                                </div>
                                <div class="introduction">
                                    {{ \Str::limit('【自己紹介】' . $post->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection