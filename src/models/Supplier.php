<?php namespace Balzreber\Delivery\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Eloquent {
	
	// Sets the Eloquent used table and supplies the delete datetime field
	protected $table = "delivery_supplier";
	protected $dates = ['deleted_at'];
	
	// Mass Assignement Security. Witch fields can be set with a input form, and witch can't
	protected $fillable = array('name');
	protected $guarded = array('id');
	
	// Validation Rules for Form Input
	public static $rules = array(
		'name' => 'required|min:5'
	);
	
	public function getBatches() {
		return $this->hasMany('Balzreber\Delivery\Models\Batch', 'supplier_id', 'id');
	}
	
	public function something() {
		return "Hello World";
	}
	
}