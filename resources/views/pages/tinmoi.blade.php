@extends('pages.master')
@section('body')
    <div class="col-md-8 paddingtop">
        <h3>{{$post->titile}}</h3>
        <div class="new-meta">
            <span class="create-author"><i class="fa fa-user-circle" aria-hidden="true"></i>{{$author}}</span>
            <span class="create-time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ date('H:i | d-m-Y', strtotime($post->created_at))}}</span>
        </div>
        <hr>
        <p class="describe-meta">{{$post->description}}</p>
        @php
            $src=str_replace("public",asset('storage'),$post->thumbnail);
        @endphp
        <img style="width: 100%;" src="{{$src}}" alt="">
        <p>&nbsp;</p>
        {!!$post->content!!}
    </div>
@endsection