<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
    	'nome','idade','email'
    ];

    protected $guarded = ['admin'];

	public $rules = [
 		'nome'=>'required|min:5',
 		'idade'=>'required|min:2',
 		'email'=>'required|min:10',
	];
}
