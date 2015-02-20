@extends('layout')

@section('content')

	<div class="page-header">
		<i class="fa fa-3x fa-truck"></i><h1>Delivery - Suppliers</h1>
	</div>
	
	{{ link_to_route('supplier.create', 'Add new Supplier', '', array('class' => 'pure-button button-small button-success')) }}<br /><br />
	
	@if($suppliers->isEmpty())
		<p>
			There are no Suppliers
		</p>
	@else
	
		<table class="pure-table supplierTable">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Actions</th>
				</tr>
			</thead>
		
			<tbody>
		
				@foreach($suppliers as $supplier)
		
					<tr class="pure-table-odd">
						<td>{{ $supplier->id }}</td>
						<td>{{ $supplier->name }}</td>
						<td class="actions">
							{{ link_to_route('supplier.edit', 'Edit', array($supplier->id), array('class' => 'pure-button button-small button-warning')) }}
							{{ Form::open(array('method' => 'DELETE', 'route' => array('supplier.destroy', $supplier->id), 'style' => 'display:inline')) }}
								{{ Form::submit('Delete', array('class' => 'pure-button button-small button-error')) }}
							{{ Form::close() }}
						</td>
					</tr>
		
				@endforeach
		
			</tbody>
		
		</table>
	@endif

@stop