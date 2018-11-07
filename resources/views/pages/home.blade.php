@extends('pages.master')
@section('body')
    <!-- tin tức -->
    <div class="col-md-8 col-sm-12 col-xs-12 paddingtop">
        <h3>Tin tức mới</h3>
        <hr>
        @if ($posts->count()<1)
            Chưa có bài viết nào
        @else
            @foreach ($posts as $post)
                <div class="colnews1">
                    <a id="UCTintucmoi_Home1_Repeater1_HyperLink1_0" href="{{ asset('bai-viet') }}/{{$post->id}}">{{$post->title}}</a>
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
@section('slide')
    <div class="container">
        <div class="carousel slide my-0" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="img/675.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                        <h4>Caption #1</h4>
                        <p class="mb-0">Paragraph. Lorem ipsum dolor sit&nbsp;</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="img/676.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                        <h4>Caption #2</h4>
                        <p class="mb-0">Paragraph. Lorem ipsum dolor sit&nbsp;</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" role="#carousel-1" data-slide="prev" href="#carousel-1"> <span
                        class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                        class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" role="button" data-slide="next" href="#carousel-1"> <span
                        class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="boxtop-small"></div>
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
