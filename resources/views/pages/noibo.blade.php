@extends('pages.master')
@section('body')
    <div class="col-md-8 paddingtop">
        <h3 title="">Tin nội bộ</h3>
        <hr>
        @if ($posts->count()<1)
            Chưa có bài viết nào
        @else
            @foreach ($posts as $post)
                <div class="colnews1">
                    <a id="UCTintucmoi_Home1_Repeater1_HyperLink1_0" href="{{ asset('bai-viet') }}/{{$post->slug}}">{{$post->title}}</a>
                </div>
                <div class="contentthongbao">
                <span id="">
                    @php
                        $src=str_replace("public",asset('storage'),$post->thumbnail);
                    @endphp
                    <img width='135' height='80'
                    style='margin: 5px; float: left;' src='{{$src}}'><div align='justify'>{{$post->description}}</div>
                    <br style='clear: left'/>
                    <p style='border-bottom: 1px dotted #CCC;margin-top: 5px;margin-bottom: 5px;margin-left: 0px;margin-right: 5px;'></p>
                </span>
                </div>
            @endforeach
        @endif
        <br>
        @if ($posts->count()>8)
            <a href="{{$posts->previousPageUrl()}}" class="btn-paginate">Trang trước</a>
            <a href="{{$posts->nextPageUrl()}}" class="btn-paginate">Trang tiếp</a>
        @endif
    </div>
@endsection

@section('header')
<style type="text/css" media="screen">
    .btn-paginate{
        padding: 15px;
        border: solid 2px #12bbad;
        color: #12bbad;
        border-radius: 5px;
        margin-right: 10px;
    }
    .btn-paginate:hover{
        background: #12bbad;
        color: white;
    }
</style>
@endsection