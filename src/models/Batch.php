<?php namespace Balzreber\Delivery\Models;

use Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Eloquent {
	
	// Sets the Eloquent used table and supplies the delete datetime field
	protected $table = "delivery_batch";
	protected $dates = ['deleted_at'];
	
	// Mass Assignement Security. Witch fields can be set with a input form, and witch can't
	protected $fillable = array('supplier_id', 'deliveryDate', 'weight', 'cost');
	protected $guarded = array('id');
	
	// Validation Rules for Form Input
	public static $rules = array(
		'supplier_id' => 'required',
		'deliveryDate' => 'required',
		'weight' => 'required|numeric',
		'cost' => 'required|numeric'
	);
	
	public function supplier() {
		return $this->belongsTo('Balzreber\Delivery\Models\Supplier');
	}
	
	public function packages() {
		return $this->hasMany('Balzreber\Delivery\Models\Package', 'id', 'package_id');
	}
	
	public function getFormatedDeliveryDate() {
		return date("d.m.Y",strtotime($this->deliveryDate));
	}
	
}
