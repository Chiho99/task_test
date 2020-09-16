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
                        氏名: {{$contact_form->your_name}}<br>
                        件名: {{$contact_form->title}}<br>
                        メールアドレス: {{$contact_form->email}}<br>
                        ホームページ: {{$contact_form->url}}<br>
                        性別: {{$gender}}<br>
                        年齢: {{$age}}<br>

                        お問い合わせ内容: {{$contact_form->contact}}<br><br><br>
                        <form method="GET" action="{{route('contacts.edit', ['id' => $contact_form->id])}}">
                        @csrf
                            <input class="btn btn-info" type="submit" value="変更する">
                        </form>

                        <form method="post" action="{{route('contacts.destroy', ['id'=>$contact_form->id])}}" id="delete_{$contact_form->id}">
                        @csrf
                        <input type="submit" class="btn btn-danger" data-id="{{$contact_form->id}}" onclick="deletePost(this);" value="削除する">
                        <!-- <a href="#" class="btn btn-danger" data-id="{{$contact_form->id}}" onclick="deletePost(this);">削除する</a> -->
                        </form>

                        <a class="btn btn-info" href="{{route('contacts.index')}}">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // ボタンを推してすぐにレコードが削除されるのも
        // 問題なので、一旦javascriptで確認メッセージを流します。
        function deletePost(e){
            'use strict';
            if(confirm('本当に削除していいですか？')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
@endsection
