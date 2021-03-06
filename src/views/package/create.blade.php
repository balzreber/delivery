@extends('layout')

@section('content')

	<div class="page-header">
		<i class="fa fa-3x fa-truck"></i><h1>Delivery - Package</h1>
	</div>

	{{ Form::open(array('route' => 'package.store', 'class' => 'pure-form pure-form-aligned')) }}

	<fieldset>
		<div class="pure-control-group">
			{{ Form::label('batch_id', 'Batch') }}
			{{ Form::select('batch_id', $batchDropdownArray, Input::old('batch_id'), array('class' => 'pure-input-1-3', 'placeholder' => 'Supplier')) }}
			{{ $errors->first('batch_id', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-control-group">
			{{ Form::label('unpackingDateTime', 'Unpacking Date & Time') }}
			{{ Form::text('unpackingDateTime', Input::old('unpackingDateTime'), array('class' => 'pure-input-1-3', 'placeholder' => 'Delivery Date')) }}
			{{ $errors->first('unpackingDateTime', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-control-group">
			{{ Form::label('weight', 'Weight') }}
			{{ Form::text('weight', Input::old('weight'), array('class' => 'pure-input-1-3', 'placeholder' => 'Weight')) }}
			{{ $errors->first('weight', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-control-group">
			{{ Form::label('recepients', 'Recepients') }}
			{{ Form::select('recepients', $recepientsDropdownArray, Input::old('recepients'), array('class' => 'pure-input-1-3', 'placeholder' => 'Supplier')) }}
			{{ $errors->first('recepients', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-control-group">
			{{ Form::label('gift', 'Gift', array('class' => 'pure-checkbox')) }}
			{{ Form::checkbox('gift', Input::old('gift')) }}
			{{ $errors->first('gift', '<span class="error">:message</span>') }}
		</div>
		
		<div class="pure-controls">
            {{ Form::submit('Create', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('package.index', 'Cancle', array(), array('class' => 'pure-button button-warning')) }}
        </div>
		
	</fieldset>

	{{ Form::close() }}

@stop