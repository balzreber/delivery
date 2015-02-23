<?php namespace Balzreber\Delivery\Controllers;

use App\Http\Controllers\Controller;
use View, Input, Validator, Redirect;
use Balzreber\Delivery\Models\Supplier as Supplier;

class SupplierController extends Controller {
       
	public $restful = true;
	
	// Show all suppliers
	public function index() {
		$suppliers = Supplier::all();
		return View::make("delivery::supplier.index", compact('suppliers'));
	}
	
	// Show form to create a new supplier
	public function create() {
		return View::make("delivery::supplier.create");
	}
	
	// Stores newly created supplier into the DB
	public function store() {
		$input = Input::all();
		$validation = Validator::make($input, Supplier::$rules);
		if($validation->passes()) {
			Supplier::create($input);
			return Redirect::route("supplier.index");
		}
		return Redirect::route("supplier.create")
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
	}
	
	// Shows the supplier with the id $id
	public function show($id) {
		$supplier = Supplier::findorfail($id);
		return Redirect::route("supplier.index");
	}
	
	// Shows the edit supplier form
	public function edit($id) {
		$supplier = Supplier::findorfail($id);
		return View::make("delivery::supplier.edit", compact('supplier'));
	}
	
	// Updates a edited supplier in the DB
	public function update($id) {
		$input = Input::all();
		$validation = Validator::make($input, Supplier::$rules);
		if($validation->passes()) {
			$supplier = Supplier::findorfail($id);
			$supplier->update($input);
			return Redirect::route("supplier.show", $id);
		}
		return Redirect::route("supplier.edit")
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
	}
	
	// Deletes a supplier from the DB
	public function destroy($id) {
		Supplier::find($id)->delete();
		return Redirect::route("supplier.index");
	}
	
}
