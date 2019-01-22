@extends('layouts.profile')
@section('title', 'プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの新規作成</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">趣味</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介欄</label>
                        <div class="col-md-10">
                          <textarea class="form-control" name="introduction" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}

                    <input type="submit" class="btn btn-primary" value="更新">
                </form>

            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">名前</th>
                        <th width="20%">趣味</th>
                        <th width="10%">性別</th>
                        <th width="40%">自己紹介</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiels as $profiel)
                        <tr>
                            <th>{{ $profiel->id }}</th>
                            <td>{{ str_limit($profiel->name, 100) }}</td>
                            <td>{{ str_limit($profiel->hobby, 250) }}</td>
                            <td>{{ str_limit($profiel->gender, 250) }}</td>
                            <td>{{ str_limit($profiel->introduction, 250) }}</td>
                            <td>
                                <div>
                                    <a href="{{ action('Admin\ProfileController@edit', ['id' => $profiel->id]) }}">編集</a>
                                </div>
                                <div>
                                    <a href="{{ action('Admin\ProfileController@delete', ['id' => $profiel->id]) }}">削除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
