@extends('layouts.app')
@section('content')


 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($contact_forms as $contact_form)
                    <div class="card">

                        <div class="card-header">{{$contact_form->id}}</div>
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif
                        </div>
                        氏名: {{$contact_form->your_name}}<br>
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
                        お問い合わせ内容: {{$contact_form->contact}}<br><br><br>
                        <a href="{{route('contacts.show', ['id' => $contact_form->id])}}">詳細をみる</a>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="register">
        <!-- aタグで書く場合 -->
        <!-- <a href="{{route('contacts.create')}}">新規登録</a> -->
        <!-- formタグで書く場合 -->
        <form action="{{route('contacts.create')}}">
            @csrf
            <button type="submit" class="btn btn-primary">
                新規登録
            </button>
        </form>
</div>

        </div>
    </div>
</div>
</div>
@endsection
