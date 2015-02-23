<?php namespace Balzreber\Delivery\Models;

use Eloquent;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Eloquent {
	
=======
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Supplier extends Eloquent {
	
	use SoftDeletingTrait;
	
>>>>>>> dbbe69b23e36ad9af0b17aa912353cab19a3f995
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