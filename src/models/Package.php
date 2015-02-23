<?php namespace Balzreber\Delivery\Models;

use Eloquent;

use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Eloquent {
	
	// Sets the Eloquent used table and supplies the delete datetime field
	protected $table = "delivery_package";
	protected $dates = ['deleted_at'];
	
	// Mass Assignement Security. Witch fields can be set with a input form, and witch can't
	protected $fillable = array('batch_id', 'unpackingDateTime', 'weight', 'recepients', 'gift');
	protected $guarded = array('id');
	
	// Validation Rules for Form Input
	public static $rules = array(
		'batch_id' => 'required',
		'unpackingDateTime' => 'required',
		'weight' => 'required|numeric',
		'recepients' => 'required|numeric'
	);
	
	public function batch() {
		return $this->belongsTo('Balzreber\Delivery\Models\Batch', 'batch_id', 'id');
	}
	
	public function getFormatedUnpackingDateTime() {
		return date("d.m.Y H:i", strtotime($this->unpackingDateTime));
	}
	
	public function getFormatedGift() {
		if($this->gift == true) return "Yes";
		return "No";
	}
	
}