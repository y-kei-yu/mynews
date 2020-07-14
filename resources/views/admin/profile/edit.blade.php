@extends('layouts.admin')
@section('title', 'プロフィール編集画面')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <lavel class="col-md-2" for="name">氏名(name)</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-md-2" for="gender">性別</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"  value="男性">
                            <label class="form-check-label">男性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"  value="女性">
                            <label class="form-check-label">女性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender"  value="その他">
                            <label class="form-check-label">その他</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2" for="hobby">趣味(hobby)</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <lavel class="col-md-2" for="introduction">自己紹介欄(introduction)</lavel>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </from>            
            </div>
        </div>
    </div>
    @endsection