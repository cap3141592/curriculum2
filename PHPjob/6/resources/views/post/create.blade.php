{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Home')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mb-4 text-right">
                    <form action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">

                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div>
                            <div class="card-header text-left"><p>つぶやき</p></div>

                            <div class="col-md-12 mx-auto">
                                <input type="text" class="form-control mt-3" name="body" placeholder="いまどうしてる？" value="{{ old('body') }}">
                            </div>

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            {{ csrf_field() }}
                            <input type="submit" value="つぶやく" class="btn btn-muted m-3 btn-lg mr-5">
                            {{-- https://getbootstrap.jp/docs/4.2/components/buttons/ --}}
                        </div>
                    </form>
                </div>

                @foreach($posts as $post)
                    @foreach($users as $user)
                        @if($user->id == $post->user_id)
                        <div>
                            <div class="card p-3">
                                <div class="row">
                                    <div class="col-6 text-left">{{ $user->name }}</div>
                                    <div class="col-6 text-right">{{ $post->created_at->format('Y/m/d H:i') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-left">{{ $post->body }}</div>
                                    @if(Auth::id() == $post->user_id)
                                        <div class="col-6 text-right">
                                            <a href="{{ action('PostController@delete', ['id' => $post->id]) }}">削除</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
