<div class="row">
    <div class="col-sm-12">
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}">Главная</a></li>
            <li>
                @if($breadcrumb_header['breadcrumb']['href'])
                    <a href="{{route($breadcrumb_header['breadcrumb']['href'])}}">{{$breadcrumb_header['breadcrumb']['title']}}</a>
                @else
                    {{$breadcrumb_header['breadcrumb']['title']}}
                @endif
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="header_block">
            <h1 class="page-header">{!! $breadcrumb_header['icon'] !!}{!! $breadcrumb_header['title'] !!}</h1>
            <a class="btn {{$breadcrumb_header['btn']['class']}}" href="{{route($breadcrumb_header['btn_href'])}}" title="{{$breadcrumb_header['btn']['text']}}">{{$breadcrumb_header['btn']['text']}}</a>
        </div>
    </div>
</div>