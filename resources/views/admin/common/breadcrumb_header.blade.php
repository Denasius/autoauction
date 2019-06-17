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
            @if(isset($filter))
                <div class="col-sm-3">
                    <div class="d_flex">
                        @isset($filter_name)
                            <span style="margin-right: 15px">{{$filter_name}}</span>
                        @endisset
                        <select id="filter_id" name="filter_id" class="form-control">
                            <option value="{{URL::current()}}">Нет</option>
                            @foreach($filter as $item)
                                <option value="{{URL::current()}}?filter_id={{$item->id}}"
                                        @if (isset($filter_id) && $filter_id == $item->id) selected @endif
                                >{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script>
                    $('#filter_id').change(function () {
                        $(location).attr('href', $(this).val());
                    });
                </script>
            @endif
            <a class="btn {{$breadcrumb_header['btn']['class']}}" href="{{route($breadcrumb_header['btn_href'])}}"
               title="{{$breadcrumb_header['btn']['text']}}">{{$breadcrumb_header['btn']['text']}}</a>
        </div>
    </div>
</div>