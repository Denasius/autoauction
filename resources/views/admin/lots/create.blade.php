@extends('admin.layout')

@section('content')

	 <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Создать лот</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Главная</a></li>
              <li><i class="icon_document_alt"></i>Создать лот</li>
            </ol>
          </div>
        </div>
        <div class="row">
        	@include('admin.errors')
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Создание нового лота
              </header>
              <div class="panel-body">
              	{{Form::open([
              		'route' => 'lots.store',
              		'files' => true,
              		'class' => 'form-horizontal'
              	])}}

              	<div class="form-group">
                            <label class="col-lg-2 control-label">Изображение</label>
                            <div class="col-lg-6">
                              <input type="file" name="image" id="image">
                              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                            </div>
                          </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" placeholder="Название">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Марка авто</label>
                    <div class="col-sm-10">
                    
                    {{ Form::select('brands', 
      			            $brands,
      			            null, 
      			            ['class'=>'form-control m-bot15']) 
      			        }}
                    
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Модель</label>
                    <div class="col-sm-10">
                      <input type="text" name="car_model" class="form-control" placeholder="Модель">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">VIN</label>
                    <div class="col-sm-10">
                      <input type="text" name="vin" class="form-control" placeholder="VIN">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Категория</label>
                    <div class="col-sm-10">
                	{{ Form::select('category_id', 
			              $categories,
			              null, 
			              ['class'=>'form-control m-bot15']) 
			        }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Состояние</label>
                    <div class="col-sm-10">
                      {{ Form::select('tags', 
			              $tags,
			              null, 
			              ['class'=>'form-control m-bot15']) 
			        }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Кол-во цилиндров</label>
                    
                      <div class="col-sm-10">
                    {{ Form::select('cylinders', 
			            $cylinders,
			            null, 
			            ['class'=>'form-control m-bot15']) 
			        }}
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Диски</label>
                    
                      <div class="col-sm-10">
                    {{ Form::select('disks', 
			            $disks,
			            null, 
			            ['class'=>'form-control m-bot15']) 
			        }}
                  
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Привод</label>
                  
                      <div class="col-sm-10">
                    {{ Form::select('drives', 
			            $drives,
			            null, 
			            ['class'=>'form-control m-bot15']) 
			        }}
                   
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Вид топлива</label>
                    
                      <div class="col-sm-10">
                    {{ Form::select('fuels', 
			            $fuels,
			            null, 
			            ['class'=>'form-control m-bot15']) 
			        }}
                    </div>
                   
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Объем двигателя</label>
                    <div class="col-lg-10">
                      
                    {{ Form::select('potencias', 
			            $potencias,
			            null, 
			            ['class'=>'form-control m-bot15']) 
			        }}
                    
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Коробка передач</label>
                    <div class="col-lg-10">
                      
                    {{ Form::select('transmissions', 
			            $transmissions,
			            null, 
			            ['class'=>'form-control m-bot15']) 
			        }}
                    
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-2 control-label">Год выпуска</label>
                    <div class="col-lg-10">                      
                        <input type="text" name="year" class="form-control" placeholder="Год выпуска">           
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Пробег</label>
                    <div class="col-sm-10">
                      <input type="text" name="car_mileage" class="form-control" placeholder="Пробег">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Покрышки</label>
                    <div class="col-sm-10">
                      <input type="text" name="tyres" class="form-control" placeholder="Покрышки">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Дополнительные опции</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="car_options" class="form-control" placeholder="Дополнительные опции"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Описание</label>
                    <div class="col-sm-10">
                      <textarea type="text" name="text" id="ckeditor" class="form-control" placeholder="Описание"></textarea>
                    </div>
                    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
                     <script type="text/javascript">
                       CKEDITOR.replace('ckeditor');
                     </script>
                  </div>

                  <label class="label_check c_on" for="checkbox-01">
                      <input name="status" id="checkbox-02" value="1" type="checkbox"> Опубликовать
                  </label>

	                 <div class="btn-create" style="margin-top: 20px; text-align: right;">
	                  	<button type="submit" class="btn btn-success" href="{{route('lots.create')}}" title="Сохранить">Сохранить</button>
	                  </div>
	              
                  </div>

                 
                {{Form::close()}}
              </div>
          </div>
        </div>
      </section>
    </section>
    <!--main content end-->

@endsection