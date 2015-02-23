@extends('layout')

@section('content')

	<div class="page-header">
		<i class="fa fa-3x fa-truck"></i><h1>Delivery - Batch</h1>
	</div>
	
	{{ link_to_route('batch.create', 'Add new Batch', '', array('class' => 'pure-button button-small button-success')) }}<br /><br />
	
	@if($batches->isEmpty())
		<p>
			There are no Suppliers
		</p>
	@else
	
		<table class="pure-table supplierTable">
			<thead>
				<tr>
					<th>Id</th>
					<th>Supplier</th>
					<th>Delivery Date</th>
					<th>Weight</th>
					<th>Cost</th>
					<th>Actions</th>
				</tr>
			</thead>
		
			<tbody>
		
				@foreach($batches as $batch)
		
					<tr class="pure-table-odd">
						<td>{{ $batch->id }}</td>
						<td>{{ $batch->supplier->name }}</td>
						<td>{{ $batch->getFormatedDeliveryDate() }}</td>
						<td>{{ $batch->weight }} g</td>
						<td>CHF {{ $batch->cost }}</td>
						<td class="actions">
							{{ link_to_route('batch.edit', 'Edit', array($batch->id), array('class' => 'pure-button button-small button-warning')) }}
							{{ Form::open(array('method' => 'DELETE', 'route' => array('batch.destroy', $batch->id), 'style' => 'display:inline')) }}
								{{ Form::submit('Delete', array('class' => 'pure-button button-small button-error')) }}
							{{ Form::close() }}
						</td>
					</tr>
		
				@endforeach
		
			</tbody>
		
		</table>
	@endif

@stop