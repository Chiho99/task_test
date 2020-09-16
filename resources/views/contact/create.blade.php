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


                        <form method="POST" action="{{route('contacts.store')}}">
                        @csrf
                            氏名<br>
                            <input type="text" name="your_name">
                            <br>
                            <br>
                            件名<br>
                            <input type="text" name="title">
                            <br>
                            <br>
                            メールアドレス<br>
                            <input type="email" name="email">
                            <br>
                            <br>
                            ホームページ<br>
                            <input type="url" name="url">
                            <br>
                            <br>
                            性別<br>
                            <input type="radio" name="gender" value="0">男性
                            <input type="radio" name="gender" value="1">女性
                            <br>
                            <br>
                            年齢<br>
                            <select name="age">
                            <option value=""></option>
                            <option value="1">~19歳</option>
                            <option value="2">20～29歳</option>
                            <option value="3">30～39歳</option>
                            <option value="4">40～49歳</option>
                            <option value="5">50～59歳</option>
                            <option value="6">60～歳</option>
                            </select>
                            <br>
                            <br>
                            お問い合わせ内容<br>
                            <textarea name="contact" id="" cols="30" rows="10"></textarea>
                            <br>
                            <br>
                            <input type="checkbox" name="caution" value="1">注意事項に同意する
                            <br>
                            <br>
                            <input class="btn btn-info" type="submit" value="登録する">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
