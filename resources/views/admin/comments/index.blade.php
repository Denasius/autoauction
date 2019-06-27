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
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>К странице</th>
                                <th>Email пользователя</th>
                                <th>Дата</th>
                                <th class="text-right">Действия</th>
                            </tr>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->title}}</td>
                                    <td>{{$comment->page_title}}</td>
                                    <td>{{$comment->author}}</td>
                                    <td>{{date('d-m-Y', strtotime($comment->comment_date))}}</td>
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