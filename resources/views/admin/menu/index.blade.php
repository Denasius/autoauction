@extends('admin.layout')

@section('content')
 	<!--main content start-->
    <section id="main-content">
        <section class="wrapper">

        <div class="row">
		    <div class="col-sm-12">
		        <ol class="breadcrumb">
		            <li><a href="http://autoauction/admin">Главная</a></li>
		            <li>Меню</li>
		        </ol>
		    </div>
		</div>

		<div class="row">
		    <div class="col-sm-12">
		        <div class="header_block">
		            <h1 class="page-header"><i class="fas fa-car"></i>Меню</h1>
		        </div>
		    </div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				{!! Menu::render() !!}
			</div>
		</div>
	    </section>
	</section>
	
@endsection
@section('customs_scripts')
    {!! Menu::scripts() !!}
@endsection