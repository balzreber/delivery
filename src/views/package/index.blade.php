@extends('layout')

@section('content')

	<div class="page-header">
		<i class="fa fa-3x fa-truck"></i><h1>Delivery - Package</h1>
	</div>
	
	{{ link_to_route('package.create', 'Add new Package', '', array('class' => 'pure-button button-small button-success')) }}<br /><br />
	
	@if($packages->isEmpty())
		<p>
			There are no Packages
		</p>
	@else
	
		<table class="pure-table supplierTable">
			<thead>
				<tr>
					<th>Id</th>
					<th>Batch</th>
					<th>Unpacking Date & Time</th>
					<th>Weight</th>
					<th>Recepients</th>
					<th>Gift</th>
					<th>Actions</th>
				</tr>
			</thead>
		
			<tbody>
		
				@foreach($packages as $package)
		
					<tr class="pure-table-odd">
						<td>{{ $package->id }}</td>
						<td>{{ $package->batch->id }}</td>
						<td>{{ $package->getFormatedUnpackingDateTime() }}</td>
						<td>{{ $package->weight }} g</td>
						<td>{{ $package->recepients }}</td>
						<td>{{ $package->getFormatedGift() }}</td>
						<td class="actions">
							{{ link_to_route('package.edit', 'Edit', array($package->id), array('class' => 'pure-button button-small button-warning')) }}
							{{ Form::open(array('method' => 'DELETE', 'route' => array('package.destroy', $package->id), 'style' => 'display:inline')) }}
								{{ Form::submit('Delete', array('class' => 'pure-button button-small button-error')) }}
							{{ Form::close() }}
						</td>
					</tr>
		
				@endforeach
		
			</tbody>
		
		</table>
	@endif

@stop