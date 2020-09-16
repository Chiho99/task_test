@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">新規登録</div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success"></div>
                                {{session('status')}}
                            </div>
                        @endif

                        </div>
                        <form method="post" action="{{route('contacts.update', ['id' => $contact_form->id])}}">
                        @csrf
                            氏名<br>
                            <input type="text" name="your_name" value="{{$contact_form->your_name}}">
                            <br>
                            <br>
                            件名<br>
                            <input type="text" name="title" value="{{$contact_form->title}}">
                            <br>
                            <br>
                            メールアドレス<br>
                            <input type="email" name="email" value="{{$contact_form->email}}">
                            <br>
                            <br>
                            ホームページ<br>
                            <input type="url" name="url"  value="{{$contact_form->url}}">
                            <br>
                            <br>
                            性別<br>
                            <input type="radio" name="gender" value="0" @if($contact_form->gender === 0) checked @endif>男性
                            <input type="radio" name="gender" value="1" @if($contact_form->gender === 1) checked @endif>女性
                            <br>
                            <br>
                            年齢<br>
                            <select name="age">
                            <option value=""></option>
                            <option value="1"@if($contact_form->age === 1) selected @endif>~19歳</option>
                            <option value="2"@if($contact_form->age === 2) selected @endif>20～29歳</option>
                            <option value="3"@if($contact_form->age === 3) selected @endif>30～39歳</option>
                            <option value="4"@if($contact_form->age === 4) selected @endif>40～49歳</option>
                            <option value="5"@if($contact_form->age === 5) selected @endif>50～59歳</option>
                            <option value="6"@if($contact_form->age === 6) selected @endif>60～歳</option>
                            </select>
                            <br>
                            <br>
                            お問い合わせ内容<br>
                            <textarea name="contact">{{$contact_form->contact}}</textarea>
                            <br>
                            <br>

                        <!-- 氏名: {{$contact_form->your_name}}<br>
                        件名: {{$contact_form->title}}<br>
                        メールアドレス: {{$contact_form->email}}<br>
                        ホームページ: {{$contact_form->url}}<br>
                        性別:
                            @if($contact_form->gender === 0)
                                男性
                            @elseif($contact_form->gender === 1)
                                女性
                            @endif<br>
                        年齢:
                            @if($contact_form->age === 1)
                                ~19歳
                            @elseif($contact_form->age === 2)
                                20～29歳
                            @elseif($contact_form->age === 3)
                                30～39歳
                            @elseif($contact_form->age === 4)
                                40～49歳
                            @elseif($contact_form->age === 5)
                                50～59歳
                            @elseif($contact_form->age === 6)
                                 60～歳
                            @endif<br>
                        お問い合わせ内容: {{$contact_form->contact}}<br><br><br> -->
                        <!-- <form method="GET" action=""> -->
                        <!-- @csrf -->
                            <input class="btn btn-info" type="submit" value="更新する">
                            <a class="btn btn-info" href="{{route('contacts.index')}}">戻る</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
