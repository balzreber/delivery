<?php namespace Balzreber\Delivery\Controllers;

use BaseController, View, Input, Validator, Redirect;
use Balzreber\Delivery\Models\Batch as Batch;
use Balzreber\Delivery\Models\Package as Package;

class PackageController extends BaseController {
       
	public $restful = true;
	
	// Show all suppliers
	public function index() {
		$packages = Package::all();
		return View::make("delivery::package.index", compact('packages'));
	}
	
	// Show form to create a new supplier
	public function create() {
		$batches = Batch::all();
		foreach($batches as $batch) $batchDropdownArray[$batch->id] = $batch->id;
		for($i = 1; $i < 21; $i++) $recepientsDropdownArray[$i] = $i;
		return View::make("delivery::package.create")
			->with('batchDropdownArray', $batchDropdownArray)
			->with('recepientsDropdownArray', $recepientsDropdownArray);
	}
	
	// Stores newly created supplier into the DB
	public function store() {
		if(Input::get('gift') === 'on') Input::merge(array('gift' => true));
		else Input::merge(array('gift' => false));
		$input = Input::all();
		$validation = Validator::make($input, Package::$rules);
		if($validation->passes()) {
			Package::create($input);
			return Redirect::route("package.index");
		}
		return Redirect::route("package.create")->withErrors($validation)->withInput();
	}
	
	// Shows the supplier with the id $id
	public function show($id) {
		$package = Package::findorfail($id);
		return Redirect::route("package.index");
	}
	
	// Shows the edit supplier form
	public function edit($id) {
		$batches = Batch::all();
		foreach($batches as $batch) $batchDropdownArray[$batch->id] = $batch->id;
		
		$package = Package::findorfail($id);
		$package->formatedDateTime = date("d.m.Y H:i", strtotime($package->unpackingDateTime));
		for($i = 1; $i < 21; $i++) $recepientsDropdownArray[$i] = $i;
		return View::make("delivery::package.edit", compact('package'))
			->with('batchDropdownArray', $batchDropdownArray)
			->with('recepientsDropdownArray', $recepientsDropdownArray);
	}
	
	// Updates a edited supplier in the DB
	public function update($id) {
		if(Input::get('gift') === 'on') Input::merge(array('gift' => true));
		else Input::merge(array('gift' => false));
		$input = Input::all();
		$input['unpackingDateTime'] = date("Y-m-d H:i:s", strtotime($input['formatedDateTime']));
		unset($input['formatedDateTime']);
		$validation = Validator::make($input, Package::$rules);
		if($validation->passes()) {
			$package = Package::findorfail($id);
			$package->update($input);
			return Redirect::route("package.show", $id);
		}
		return Redirect::route("package.edit")->withErrors($validation)->withInput();
	}
	
	// Deletes a supplier from the DB
	public function destroy($id) {
		Package::find($id)->delete();
		return Redirect::route("package.index");
	}
	
}
