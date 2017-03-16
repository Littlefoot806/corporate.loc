<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Gate;
use Corp\User;
use Auth;


class IndexController extends AdminController
{
	public function __construct() {
		parent::__construct();


		if(Gate::denies('VIEW_ADMIN')) {
			abort(403, 'Unauthorized Page Request');
		}
		
		$this->template = env('THEME').'.admin.index';
	}

	public function index() {
		$this->title = 'Пaнель администратора';

		return $this->renderOutput();
	}

}
