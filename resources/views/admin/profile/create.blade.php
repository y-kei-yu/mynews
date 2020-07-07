<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>My Profile</title>
    </head>
    <body>
        <h1>プロフィール作成画面</h1>
    </body>
</html>

 {{-- layouts/profile.blade.phpを読み込む --}}
    @extends('layouts.profile')
    
    {{-- profile.blade.phpの@yield('title')に'Myプロフィール'を埋め込む --}}
    @section('title', 'Myプロフィール')
    
    {{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <lavel class="col-md-2">氏名(name)</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">性別(gender)</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">趣味(hobby)</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2">自己紹介欄(introduction)</lavel>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </from>            
            </div>
        </div>
    </div>
    @endsection