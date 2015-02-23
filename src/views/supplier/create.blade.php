@extends('layout')

@section('content')

	<div class="page-header">
		<i class="fa fa-3x fa-truck"></i><h1>Delivery - Suppliers</h1>
	</div>

	{{ Form::open(array('route' => 'supplier.store', 'class' => 'pure-form pure-form-aligned')) }}

	<fieldset>
		<div class="pure-control-group">
			{{ Form::label('name', 'Supplier Name') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'pure-input-1-3', 'placeholder' => 'Supplier Name')) }}
			{{ $errors->first('name', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-controls">
            {{ Form::submit('Create', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('supplier.index', 'Cancle', array(), array('class' => 'pure-button button-warning')) }}
        </div>
		
	</fieldset>

	{{ Form::close() }}

@stop