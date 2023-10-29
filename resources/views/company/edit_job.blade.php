@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('css/company/edit_job.css') }}">
@endsection

@section('content')
<div class="applicant-section">
    <form class="applicant-form" action="/company/detail/{{ $job['id'] }}/edit" method="POST">
    @csrf
        <h1 class="applicant-title">求人修正</h1>
        <div class="applicant-item">
            <label class="applicant-item__title">ジャンル</label>
            <select class="applicant-item__content" name="genre_id">
                @foreach ($genres as $genre)
                <option class="applicant-item__option" value="{{ $genre['id'] }}" @if ($genre['id'] == $job['genre_id']) selected @endif>{{ $genre['name'] }}</option>
                @endforeach
            </select>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="genre">ジャンル(上記に無いジャンルの場合)</label>
            <input class="applicant-item__content" id="genre" type="text" name="genre" value="{{ old('genre') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('genre')
                    {{ $errors->first('genre') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title">勤務地</label>
            <select class="applicant-item__content" name="area_id">
                @foreach ($areas as $area)
                <option class="applicant-item__option" value="{{ $area['id'] }}" @if ($area['id'] == $job['area_id']) selected @endif>{{ $area['name'] }}</option>
                @endforeach
            </select>
            <p class="applicant-item__error"></p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="name">企業名</label>
            <input class="applicant-item__content" id="name" type="text" name="name" value="{{ empty(old('name')) ?$job['name'] : old('name') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('name')
                    {{ $errors->first('name') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="content">仕事の内容</label>
            <textarea class="applicant-item__content textarea" name="content" id="content" cols="30" rows="7" placeholder="入力欄">{{ empty(old('content')) ?$job['content'] : old('content') }}</textarea>
            <p class="applicant-item__error">
                @error('content')
                    {{ $errors->first('content') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="email">メールアドレス</label>
            <input class="applicant-item__content" id="email" type="text" name="email" value="{{ empty(old('email')) ?$job['email'] : old('email') }}" placeholder="入力欄" readonly>
            <p class="applicant-item__error">
                @error('email')
                    {{ $errors->first('email') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="tel">電話番号</label>
            <input class="applicant-item__content" id="tel" type="text" name="tel" value="{{ empty(old('tel')) ?$job['tel'] : old('tel') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('tel')
                    {{ $errors->first('tel') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="salary">給料</label>
            <input class="applicant-item__content" id="salary" type="text" name="salary" value="{{ empty(old('salary')) ?$job['salary'] : old('salary') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('salary')
                    {{ $errors->first('salary') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="time">勤務時間</label>
            <input class="applicant-item__content" id="time" type="text" name="time" value="{{ empty(old('time')) ?$job['time'] : old('time') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('time')
                    {{ $errors->first('time') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="shift">シフト</label>
            <input class="applicant-item__content" id="shift" type="text" name="shift" value="{{ empty(old('shift')) ?$job['shift'] : old('shift') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('shift')
                    {{ $errors->first('shift') }}
                @enderror
            </p>
        </div>
        <div class="applicant-item">
            <label class="applicant-item__title" for="location">勤務場所</label>
            <input class="applicant-item__content" id="location" type="text" name="location" value="{{ empty(old('location')) ?$job['location'] : old('location') }}" placeholder="入力欄">
            <p class="applicant-item__error">
                @error('location')
                    {{ $errors->first('location') }}
                @enderror
            </p>
        </div>
        <div class="applicant-buttons">
            <button class="applicant-button">更新する</button>
            <a class="applicant-button back" href="/company/detail/{{ $job['id'] }}">戻る</a>
        </div>
    </form>
</div>
@endsection