@extends('pages.master')
@section('body')
    <div class="col-md-8 paddingtop">
        <h3>Biểu cước dịch vụ cảng biển</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>File</th>
                <th>Ngày đăng</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($charges as $charge)
                    <tr>
                        <td><a href="{{str_replace("public",asset('storage'),$charge->link)}}">{{$charge->name}}</a></td>
                        <td>{{date('d-m-Y', strtotime($charge->created_at))}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
@endsection