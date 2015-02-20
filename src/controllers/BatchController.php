<?php namespace Balzreber\Delivery\Controllers;

use BaseController, View, Input, Validator, Redirect;
use Balzreber\Delivery\Models\Batch as Batch;
use Balzreber\Delivery\Models\Supplier as Supplier;

class BatchController extends BaseController {
       
	public $restful = true;
	
	// Show all suppliers
	public function index() {
		$batches = Batch::all();
		return View::make("delivery::batch.index", compact('batches'));
	}
	
	// Show form to create a new supplier
	public function create() {
		$suppliers = Supplier::all();
		foreach($suppliers as $supplier) $supplierDropdownArray[$supplier->id] = $supplier->name;
		return View::make("delivery::batch.create")->with('supplierDropdownArray', $supplierDropdownArray);
	}
	
	// Stores newly created supplier into the DB
	public function store() {
		$input = Input::all();
		$validation = Validator::make($input, Batch::$rules);
		if($validation->passes()) {
			Batch::create($input);
			return Redirect::route("batch.index");
		}
		return Redirect::route("batch.create")->withErrors($validation)->withInput();
	}
	
	// Shows the supplier with the id $id
	public function show($id) {
		$batch = Batch::findorfail($id);
		return Redirect::route("batch.index");
	}
	
	// Shows the edit supplier form
	public function edit($id) {
		$suppliers = Supplier::all();
		foreach($suppliers as $supplier) $supplierDropdownArray[$supplier->id] = $supplier->name;
		
		$batch = Batch::findorfail($id);
		$batch->formatedDate = date("d.m.Y", strtotime($batch->deliveryDate));
		return View::make("delivery::batch.edit", compact('batch'))->with('supplierDropdownArray', $supplierDropdownArray);
	}
	
	// Updates a edited supplier in the DB
	public function update($id) {
		$input = Input::all();
		$input['deliveryDate'] = date("Y-m-d", strtotime($input['formatedDate']));
		unset($input['formatedDate']);
		$validation = Validator::make($input, Batch::$rules);
		if($validation->passes()) {
			$batch = Batch::findorfail($id);
			$batch->update($input);
			return Redirect::route("batch.show", $id);
		}
		return Redirect::route("batch.edit")->withErrors($validation)->withInput();
	}
	
	// Deletes a supplier from the DB
	public function destroy($id) {
		Batch::find($id)->delete();
		return Redirect::route("batch.index");
	}
	
}
