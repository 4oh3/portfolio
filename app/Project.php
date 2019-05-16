<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = ['title', 'technologies', 'description', 'image', 'date', 'sourcecode', 'hostedlink', 'hostedstatus', 'searchtags'];
}
