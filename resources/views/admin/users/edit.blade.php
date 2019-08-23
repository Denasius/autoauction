@extends('admin.layout')

@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

        @include('admin.common.breadcrumb_header')

        <!-- page start-->
            <div class="row">

                @include('admin.errors')

                <div class="col-sm-12">
                    <section class="panel">
                        <div class="panel-body">

                            {{Form::open([
                              'route' => ['users.update', $user->id],
                              'files' => true,
                              'method' => 'put',
                              'class'=>'form-horizontal',
                              'role'>'form'
                              ])}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Логин</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Тип пользователя</label>
                                <div class="col-sm-10">
                                    <select name="role_id" class="form-control">
                                        @foreach($roles as $item)
                                            <option value="{{$item->id}}" @if($user->role_id == $item->id) selected @endif >{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Город</label>
                                <div class="col-sm-10">
                                    <input type="text" name="town" class="form-control" id="c-town" placeholder="Город пользователя"
                                           value="{{$user->town}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email пользователя"
                                           value="{{$user->email}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Пароль</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 text-right">
                                    <img class="uploaded_image" src="{{$user->getImage()}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Аватар</label>
                                <div class="col-sm-10">
                                    <input type="file" name="avatar" id="avatar">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Юридическое лицо</label>
                                <div class="col-sm-10">
                                    <select name="entity" class="form-control">
                                        <option value="0" @if($user->entity == 0) selected @endif >Нет</option>
                                        <option value="1" @if($user->entity == 1) selected @endif >Да</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" @if($user->entity != 1) style="display:none;" @endif >
                                <label class="col-sm-2 control-label">Название компании</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_company" class="form-control" value="{{$user->user_company}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Имя</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_name" class="form-control" value="{{$user->user_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Фамилия</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_surname" class="form-control" value="{{$user->user_surname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Адрес</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_addres" class="form-control" value="{{$user->user_addres}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Адрес 2</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_addres_2" class="form-control" value="{{$user->user_addres_2}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Страна</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_country" class="form-control" value="{{$user->user_country}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Регион</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_region" class="form-control" value="{{$user->user_region}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Почтовый индекс</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_index" class="form-control" value="{{$user->user_index}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Телефон</label>
                                <div class="col-sm-10">
                                    <input type="text" name="user_phone" class="form-control" value="{{$user->user_phone}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Дата рождения</label>
                                <div class="col-sm-10">
                                    <input type="date" name="user_dob" class="form-control" value="{{$user->user_dob}}">
                                </div>
                            </div>

                            <div class="form-group file_uploads">
                                <label class="col-sm-2 control-label">Изображения документов</label>
                                <div class="col-sm-10 items">
                                    @foreach($images as $image)
                                        <div class="item">
                                            <label>
                                                <span class="previews">
                                                    <a data-fancybox="gallery" href="{{ asset('uploads/docs/' . $image) }}">
                                                    <img data-src="{{$image}}" data-user={{$user->id}} src="{{ asset('uploads/docs/' . $image) }}" alt="">
                                                    </a>
                                                </span>
                                                <input type="file" class="input_img_upload" style="display:none;">
                                                <input type="hidden" name="images[]" value="{{$image}}">
                                            </label>
                                            <button type="button" class="btn btn-danger" onclick="remove_item(this)">Удалить</button>
                                        </div>
                                    @endforeach 
                                </div>
                                {{-- <div class="col-sm-10 col-sm-offset-2">
                                    <button type="button" class="btn btn-info add_image">Добавить еще картинки</button>
                                </div> --}}

                            </div>


                            <div class="form-group">
                                <div class="btn-create text-right col-sm-12">
                                    <button type="submit" class="btn btn-add" title="Обновить">Обновить</button>
                                </div>
                            </div>
                            {{Form::close()}}

                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>

    <script>

        //Юр или не юр
        $('[name="entity"]').change(function () {
            if ($(this).val() == 1) {
                $('[name="user_company"]').parent().parent().show();
            } else {
                $('[name="user_company"]').parent().parent().hide();
            }
        });

        //Добавить еще изображение
        $('.add_image').click(function () {
            $('.file_uploads .items').append('<div class="item">\n' +
                '                                            <label>\n' +
                '                                                <span class="previews">\n' +
                '                                                    <i class="fas fa-image"></i>\n' +
                '                                                </span>\n' +
                '                                                <input type="file" class="input_img_upload" style="display:none;">\n' +
                '                                                <input type="hidden" name="images[]">\n' +
                '                                            </label>\n' +
                '                                            <button type="button" class="btn btn-danger" onclick="remove_item(this)">Delete</button>\n' +
                '                                        </div>');

            $('.input_img_upload').change(function () {
                upload_image(this);
            });
        });


        //Загрузка файла на сервер
        $('.input_img_upload').change(function () {
            upload_image(this);

        });

        function upload_image(this_item) {
            var this_element = this_item;

            var file_data = $(this_item).prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route("upload_image_profile")}}',
                data: form_data,
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                success: function (result) {
                    $(this_element).prev().html('<img src="/' + result + '" alt="">');
                    $(this_element).next().val(result);
                }
            });
        }

        function remove_item(this_item) {
            var this_image = $(this_item).closest('.item').find('img').data('src');
            var user_id = $(this_item).closest('.item').find('img').data('user');
            
            var form_data = new FormData();
            form_data.append('file', this_image);
            form_data.append('user_id', user_id);
            
            return $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route("delete.image")}}',
                data: form_data,
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                beforeSend: function () {
                    $(this_item).text('Ожидайте...');
                },
                success: function (response) {
                    console.log(response);
                    $(this_item).parent().remove();
                },
                error: function (request, errorStatus, errorThrown) {
				console.log(request);
				console.log(errorStatus);
				console.log(errorThrown);
			}
            });
        }

    </script>

@endsection