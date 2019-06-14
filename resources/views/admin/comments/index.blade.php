@extends('admin.layout')

@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

        @include('admin.common.breadcrumb_header')

        <!-- page start-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="icon_paperclip"></i> ID</th>
                                <th><i class="icon_paperclip"></i> Заголовок</th>
                                <th><i class="icon_menu-square_alt2"></i> К странице</th>
                                <th><i class="icon_profile"></i> Email пользователя</th>
                                <th><i class="icon_calendar"></i> Дата</th>
                                <th class="text-right"><i class="icon_cogs"></i> Действия</th>
                            </tr>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->title}}</td>
                                    <td>{{$comment->page_title}}</td>
                                    <td>{{$comment->author}}</td>
                                    <td>{{$comment->comment_date}}</td>
                                    <td class="text-right">
                                        <div class="btn-group event_btn_group">
                                            <a class="btn btn-primary" href="{{route('comments.edit', $comment->id)}}"><i class="fas fa-edit"></i></a>
                                            {{Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                            <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i></button>
                                            {{Form::close()}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
@endsection