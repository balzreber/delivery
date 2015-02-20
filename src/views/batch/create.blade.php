@extends('layout')

@section('content')

	<div class="page-header">
		<i class="fa fa-3x fa-truck"></i><h1>Delivery - Batch</h1>
	</div>

	{{ Form::open(array('route' => 'batch.store', 'class' => 'pure-form pure-form-aligned')) }}

	<fieldset>
		<div class="pure-control-group">
			{{ Form::label('supplier_id', 'Supplier') }}
			{{ Form::select('supplier_id', $supplierDropdownArray, Input::old('supplier_id'), array('class' => 'pure-input-1-3', 'placeholder' => 'Supplier')) }}
			{{ $errors->first('supplier_id', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-control-group">
			{{ Form::label('deliveryDate', 'Delivery Date') }}
			{{ Form::text('deliveryDate', Input::old('deliveryDate'), array('class' => 'pure-input-1-3', 'placeholder' => 'Delivery Date')) }}
			{{ $errors->first('deliveryDate', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-control-group">
			{{ Form::label('weight', 'Weight') }}
			{{ Form::text('weight', Input::old('weight'), array('class' => 'pure-input-1-3', 'placeholder' => 'Weight')) }}
			{{ $errors->first('weight', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-control-group">
			{{ Form::label('cost', 'Cost') }}
			{{ Form::text('cost', Input::old('cost'), array('class' => 'pure-input-1-3', 'placeholder' => 'Cost')) }}
			{{ $errors->first('cost', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-controls">
            {{ Form::submit('Create', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('batch.index', 'Cancle', array(), array('class' => 'pure-button button-warning')) }}
        </div>
		
	</fieldset>

	{{ Form::close() }}

@stop