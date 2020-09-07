    @foreach($values as $value )
    {{$value->id}}
    {{$value->text}}
    @endforeach

    @foreach($chunks as $chunk)
    {{$chunk}}
    @endforeach
