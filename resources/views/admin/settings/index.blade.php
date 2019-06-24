@extends('admin.layout')

@section('content')




    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('admin')}}">Главная</a></li>
                        <li>Настройки</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="header_block">
                        <h1 class="page-header"><i class="fas fa-cogs"></i>Настройки</h1>
                    </div>
                </div>
            </div>

            @if($error)
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-block alert-danger fade in">
                            Полующие поля не были добавлены <br>
                            {!! $error !!}
                        </div>
                    </div>
                </div>
            @endif

            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">

                    <section class="panel">
                        <header class="panel-heading">
                            <div class="col-sm-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#tab_1" aria-controls="tab_1" role="tab" data-toggle="tab">Основное</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab_2" aria-controls="tab_2" role="tab" data-toggle="tab">Хедер</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab_3" aria-controls="tab_3" role="tab" data-toggle="tab">Футер</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#tab_4" aria-controls="tab_4" role="tab" data-toggle="tab">Другое</a>
                                    </li>
                                </ul>
                            </div>
                        </header>

                        <div class="panel-body">
                            {{Form::open([
                               'route' => ['settings.update', 1],
                               'class' => 'form-horizontal',
                               'method' => 'put'
                           ])}}
                            <div class="tab-content">
                                {{--Теги tab_1--}}
                                <div role="tabpanel" class="tab-pane active" id="tab_1">
                                    <div class="section main-address">
                                        Адрес Магазина (или чего то там)
                                        <table class="table table-striped table-advance table-hover table-min-padding">
                                            <thead>
                                                <tr>
                                                    <th>slug</th>
                                                    <th>Тип</th>
                                                    <th>Название</th>
                                                    <th width="40%">Значение</th>
                                                    <th class="text-right">Действия</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @isset($address)
                                                @foreach( $address as $item )
                                                    <tr class="address-link-row">
                                                        <input name="tab[]" type="hidden" value="1">
                                                        <input type="hidden" name="version[]" value="address">
                                                        <th>
                                                            <input class="form-control" name="name[]" type="text" required="" value="{{ $item->name }}">
                                                        </th>
                                                        <th>
                                                            <select name="type[]" class="form-control m-bot15">
                                                                <option value="1" @if($item->type == 1) selected @endif >Текст</option>
                                                                <option value="2" @if($item->type == 2) selected @endif>Текстовая область</option>
                                                                <option value="3" @if($item->type == 3) selected @endif>Checkbox</option>
                                                                <option value="4" @if($item->type == 4) selected @endif>Файл</option>
                                                            </select>
                                                        </th>
                                                        <th>
                                                            <input class="form-control" name="descr[]" type="text" value="{{ $item->descr }}">
                                                        </th>
                                                        <th>
                                                            <input class="form-control" name="value[]" type="text" value="{{ $item->value }}" required="">
                                                        </th>
                                                        <th class="text-right">
                                                            <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                             </tbody>
                                            
                                            </tbody>
                                        </table>
                                        <a href="javascript:void(0);" class="btn btn-success add-address-row">Добавить адрес</a>
                                    </div>
                                    
                                    <div class="section social-links">
                                        Ссылки на соцсети
                                        <table class="table table-striped table-advance table-hover table-min-padding">
                                            <tbody>
                                                <thead>
                                                    <tr>
                                                        <th>slug</th>
                                                        <th>Тип</th>
                                                        <th>Название</th>
                                                        <th width="40%">Значение</th>
                                                        <th class="text-right">Действия</th>
                                                    </tr>
                                                </thead>
                                                @isset($socials)
                                                    @foreach( $socials as $item )
                                                        <tr class="social-link-row">
                                                            <input name="tab[]" type="hidden" value="1">
                                                            <input type="hidden" name="version[]" value="socials">
                                                            <th>
                                                                <input class="form-control" name="name[]" type="text" required="" value="{{ $item->name }}">
                                                            </th>
                                                            <th>
                                                                <select name="type[]" class="form-control m-bot15">
                                                                    <option value="1" @if($item->type == 1) selected @endif >Текст</option>
                                                                <option value="2" @if($item->type == 2) selected @endif>Текстовая область</option>
                                                                <option value="3" @if($item->type == 3) selected @endif>Checkbox</option>
                                                                <option value="4" @if($item->type == 4) selected @endif>Файл</option>
                                                                </select>
                                                            </th>
                                                            <th>
                                                                <input class="form-control" name="descr[]" type="text" value="{{ $item->descr }}">
                                                            </th>
                                                            <th>
                                                                <input class="form-control" name="value[]" type="text" required="" value="{{ $item->value }}">
                                                            </th>
                                                            <th class="text-right">
                                                                <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                        <a href="javascript:void(0);" class="btn btn-success add-social-row">Добавить соцсеть</a>
                                    </div>

                                    <div class="section phones">
                                        Номера телефонов
                                        <table class="table table-striped table-advance table-hover table-min-padding">
                                            <tbody>
                                                <thead>
                                                    <tr>
                                                        <th>slug</th>
                                                        <th>Тип</th>
                                                        <th>Название</th>
                                                        <th width="40%">Значение</th>
                                                        <th class="text-right">Действия</th>
                                                    </tr>
                                                </thead>
                                                @isset($phones)
                                                    @foreach( $phones as $item )
                                                        <tr class="phones-link-row">
                                                            <input name="tab[]" type="hidden" value="1">
                                                            <input type="hidden" name="version[]" value="phones">
                                                            <th>
                                                                <input class="form-control" name="name[]" type="text" required="" value="{{ $item->name }}">
                                                            </th>
                                                            <th>
                                                                <select name="type[]" class="form-control m-bot15">
                                                                <option value="1" @if($item->type == 1) selected @endif >Текст</option>
                                                                <option value="2" @if($item->type == 2) selected @endif>Текстовая область</option>
                                                                <option value="3" @if($item->type == 3) selected @endif>Checkbox</option>
                                                                <option value="4" @if($item->type == 4) selected @endif>Файл</option>
                                                                </select>
                                                            </th>
                                                            <th>
                                                                <input class="form-control" name="descr[]" type="text" value="{{ $item->descr }}">
                                                            </th>
                                                            <th>
                                                                <input class="form-control" name="value[]" type="text" required="" value="{{ $item->value }}">
                                                            </th>
                                                            <th class="text-right">
                                                                <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                @endisset
                                            </tbody>
                                        </table>
                                        <a href="javascript:void(0);" class="btn btn-success add-phones-row">Добавить телефон</a>
                                    </div>

                                </div>

                                {{--Теги tab_2--}}
                                <div role="tabpanel" class="tab-pane" id="tab_2">
                                    <table class="table table-striped table-advance table-hover table-min-padding">
                                        <tbody>
                                        <tr>
                                            <th>slug</th>
                                            <th>Тип</th>
                                            <th>Название</th>
                                            <th width="40%">Значение</th>
                                            <th class="text-right">Действия</th>
                                        </tr>
                                        @foreach($tab_2 as $item)
                                            <tr>
                                                {{Form::hidden('tab[]', 2)}}
                                                <th>
                                                    {{Form::text('name[]', $item->name, ['class'=>'form-control', 'required'])}}
                                                </th>
                                                <th>
                                                    <select name="type[]" class="form-control m-bot15">
                                                        <option value="1" @if($item->type == 1) selected @endif >Текст</option>
                                                        <option value="2" @if($item->type == 2) selected @endif>Текстовая область</option>
                                                        <option value="3" @if($item->type == 3) selected @endif>Checkbox</option>
                                                        <option value="4" @if($item->type == 4) selected @endif>Файл</option>
                                                    </select>
                                                </th>
                                                <th>
                                                    {{Form::text('descr[]', $item->descr, ['class'=>'form-control'])}}
                                                </th>
                                                <th>
                                                    {{Form::text('value[]', $item->value, ['class'=>'form-control', 'required'])}}
                                                </th>
                                                <th class="text-right">
                                                    <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                    <div class="form-group">
                                        <div class="btn-create text-center col-sm-12">
                                            <button type="button" class="btn btn-add add_setting" title="Добавить" data-tab="2">Добавить</button>
                                        </div>
                                    </div>

                                </div>

                                {{--Теги tab_3--}}
                                <div role="tabpanel" class="tab-pane" id="tab_3">
                                    <table class="table table-striped table-advance table-hover table-min-padding">
                                        <tbody>
                                        <tr>
                                            <th>slug</th>
                                            <th>Тип</th>
                                            <th>Название</th>
                                            <th width="40%">Значение</th>
                                            <th class="text-right">Действия</th>
                                        </tr>
                                        @foreach($tab_3 as $item)
                                            <tr>
                                                {{Form::hidden('tab[]', 3)}}
                                                <th>
                                                    {{Form::text('name[]', $item->name, ['class'=>'form-control', 'required'])}}
                                                </th>
                                                <th>
                                                    <select name="type[]" class="form-control m-bot15">
                                                        <option value="1" @if($item->type == 1) selected @endif >Текст</option>
                                                        <option value="2" @if($item->type == 2) selected @endif>Текстовая область</option>
                                                        <option value="3" @if($item->type == 3) selected @endif>Checkbox</option>
                                                        <option value="4" @if($item->type == 4) selected @endif>Файл</option>
                                                    </select>
                                                </th>
                                                <th>
                                                    {{Form::text('descr[]', $item->descr, ['class'=>'form-control'])}}
                                                </th>
                                                <th>
                                                    {{Form::text('value[]', $item->value, ['class'=>'form-control', 'required'])}}
                                                </th>
                                                <th class="text-right">
                                                    <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                    <div class="form-group">
                                        <div class="btn-create text-center col-sm-12">
                                            <button type="button" class="btn btn-add add_setting" title="Добавить" data-tab="3">Добавить</button>
                                        </div>
                                    </div>

                                </div>

                                {{--Теги tab_4--}}
                                <div role="tabpanel" class="tab-pane" id="tab_4">
                                    <table class="table table-striped table-advance table-hover table-min-padding">
                                        <tbody>
                                        <tr>
                                            <th>slug</th>
                                            <th>Тип</th>
                                            <th>Название</th>
                                            <th width="40%">Значение</th>
                                            <th class="text-right">Действия</th>
                                        </tr>
                                        @foreach($tab_4 as $item)
                                            <tr>
                                                {{Form::hidden('tab[]', 4)}}
                                                <th>
                                                    {{Form::text('name[]', $item->name, ['class'=>'form-control', 'required'])}}
                                                </th>
                                                <th>
                                                    <select name="type[]" class="form-control m-bot15">
                                                        <option value="1" @if($item->type == 1) selected @endif >Текст</option>
                                                        <option value="2" @if($item->type == 2) selected @endif>Текстовая область</option>
                                                        <option value="3" @if($item->type == 3) selected @endif>Checkbox</option>
                                                        <option value="4" @if($item->type == 4) selected @endif>Файл</option>
                                                    </select>
                                                </th>
                                                <th>
                                                    {{Form::text('descr[]', $item->descr, ['class'=>'form-control'])}}
                                                </th>
                                                <th>
                                                    {{Form::text('value[]', $item->value, ['class'=>'form-control', 'required'])}}
                                                </th>
                                                <th class="text-right">
                                                    <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                    <div class="form-group">
                                        <div class="btn-create text-center col-sm-12">
                                            <button type="button" class="btn btn-add add_setting" title="Добавить" data-tab="4">Добавить</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <hr>
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Сохранить">Сохранить</button>
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

    <script>
        $('select[name = type]').change(function () {
            console.log($(this).val());
            if ($(this).val() == 1) {

            }
        });

        $('.btn_remove').click(function () {
            $(this).parent().parent().remove();
        });

        $('.add_setting').click(function () {
            $('#tab_'+$(this).data('tab') +' tbody').append('<tr>\n' +
                '<input name="tab[]" type="hidden" value="'+$(this).data('tab') +'">\n' +
                '<th>\n' +
                '    <input class="form-control" name="name[]" type="text" required>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <select name="type[]" class="form-control m-bot15">\n' +
                '        <option value="1">Текст</option>\n' +
                '        <option value="2">Текстовая область</option>\n' +
                '        <option value="3">Checkbox</option>\n' +
                '        <option value="4">Файл</option>\n' +
                '    </select>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="descr[]" type="text">\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="value[]" type="text" required>\n' +
                '</th>\n' +
                '<th class="text-right">\n' +
                '    <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">\n' +
                '        <i class="fas fa-trash-alt"></i>\n' +
                '    </button>\n' +
                '</th>\n' +
                '</tr>');

            $('.btn_remove').click(function () {
                $(this).parent().parent().remove();
            });
        });

        $('.add-social-row').on('click', function () {
            $(this).closest('.social-links').find('tbody').append('<tr>\n' +
                '<input name="tab[]" type="hidden" value="1">\n' +
                '<input type="hidden" name="version[]" value="socials">\n' +
                '<th>\n' +
                '    <input class="form-control" name="name[]" type="text" required>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <select name="type[]" class="form-control m-bot15">\n' +
                '        <option value="1">Текст</option>\n' +
                '        <option value="2">Текстовая область</option>\n' +
                '        <option value="3">Checkbox</option>\n' +
                '        <option value="4">Файл</option>\n' +
                '    </select>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="descr[]" type="text">\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="value[]" type="text" required>\n' +
                '</th>\n' +
                '<th class="text-right">\n' +
                '    <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">\n' +
                '        <i class="fas fa-trash-alt"></i>\n' +
                '    </button>\n' +
                '</th>\n' +
                '</tr>');
            $('.btn_remove').click(function () {
                $(this).parent().parent().remove();
            });
        });

        $('.add-phones-row').on('click', function () {
            $(this).closest('.phones').find('tbody').append('<tr>\n' +
                '<input name="tab[]" type="hidden" value="1">\n' +
                '<input type="hidden" name="version[]" value="phones">\n' +
                '<th>\n' +
                '    <input class="form-control" name="name[]" type="text" required>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <select name="type[]" class="form-control m-bot15">\n' +
                '        <option value="1">Текст</option>\n' +
                '        <option value="2">Текстовая область</option>\n' +
                '        <option value="3">Checkbox</option>\n' +
                '        <option value="4">Файл</option>\n' +
                '    </select>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="descr[]" type="text">\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="value[]" type="text" required>\n' +
                '</th>\n' +
                '<th class="text-right">\n' +
                '    <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">\n' +
                '        <i class="fas fa-trash-alt"></i>\n' +
                '    </button>\n' +
                '</th>\n' +
                '</tr>');
            $('.btn_remove').click(function () {
                $(this).parent().parent().remove();
            });
        });

        $('.add-address-row').on('click', function () {
            $(this).closest('.main-address').find('tbody').append('<tr>\n' +
                '<input name="tab[]" type="hidden" value="1">\n' +
                '<input type="hidden" name="version[]" value="address">\n' +
                '<th>\n' +
                '    <input class="form-control" name="name[]" type="text" required>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <select name="type[]" class="form-control m-bot15">\n' +
                '        <option value="1">Текст</option>\n' +
                '        <option value="2">Текстовая область</option>\n' +
                '        <option value="3">Checkbox</option>\n' +
                '        <option value="4">Файл</option>\n' +
                '    </select>\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="descr[]" type="text">\n' +
                '</th>\n' +
                '<th>\n' +
                '    <input class="form-control" name="value[]" type="text" required>\n' +
                '</th>\n' +
                '<th class="text-right">\n' +
                '    <button type="button" class="btn btn-danger btn_remove" style="border-radius: 4px">\n' +
                '        <i class="fas fa-trash-alt"></i>\n' +
                '    </button>\n' +
                '</th>\n' +
                '</tr>');
            $('.btn_remove').click(function () {
                $(this).parent().parent().remove();
            });
        });
    </script>


@endsection