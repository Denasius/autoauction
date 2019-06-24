@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">


            @include('admin.common.breadcrumb_header')

            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    @if(! empty( $categories ))
                        <section class="panel">
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th><i class="icon_profile"></i> ID</th>
                                    <th><i class="icon_calendar"></i> Название</th>
                                    <th><i class="icon_calendar"></i> Родительская категория</th>
                                    <th class="text-right"><i class="icon_cogs"></i> Действия</th>
                                </tr>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->getTitleParentCategory($category->parent_category)}}</td>
                                        <td style="text-align: right;">
                                            <div class="btn-group event_btn_group">
                                                <a class="btn btn-primary" href="{{route('categories.edit', $category->id)}}"><i class="fas fa-edit"></i></a>
                                                {{Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete', 'class'=>'inline_block'])}}
                                                <button type="submit" class="btn btn-danger" data-attr="delete"><i class="fas fa-trash-alt"></i></button>
                                                {{Form::close()}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </section>
                    @else
                        <section class="panel">
                            <header class="panel-heading">
                                <h1>Список категорий пуст</h1>
                            </header>
                        </section>
                    @endif
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

@endsection