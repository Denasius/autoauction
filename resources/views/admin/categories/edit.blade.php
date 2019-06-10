@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Редактирование категории</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{route('admin')}}">Главная</a></li>
                        <li><i class="fa fa-table"></i><a href="{{route('categories.index')}}">Категории</a></li>
                        <li><i class="fa fa-file-text-o"></i>Изменить категорию</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                @include('admin.errors')
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="col-sm-12">
                                Изменение категории
                            </div>
                        </header>
                        <div class="panel-body">
                            {{Form::open(['route'=>['categories.update', $category_info->id], 'method'=>'put', 'class'=>'form-horizontal'])}}

                            <input type="hidden" name="id" value="{{$category_info->id}}">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" value="{{$category_info->title}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="descr" id="ckeditor" class="form-control">{{$category_info->descr}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Родительская категория</label>
                                <div class="col-sm-10">
                                    <select name="parent_category" class="form-control">
                                        <option value="0" @if ($category_info->parent_category == 0) selected @endif>Нет</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}" @if ($category_info->parent_category == $item->id) selected @endif>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" class="form-control" value="{{$category_info->meta_title}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="meta_description" class="form-control">{{$category_info->meta_description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-primary">Создать</button>
                                </div>
                            </div>

                            {{Form::close()}}
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');
    </script>
@endsection