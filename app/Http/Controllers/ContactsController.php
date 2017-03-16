<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactsController extends SiteController
{
    //
	public function __construct() {
            parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

         
            $this->bar = 'left';
            $this->template = env('THEME').'.contacts';
            
    }
    public function index(Request $request) {
    
    	if($request->isMethod('post')) {

    		$messages = [
    			'required' => "Поле :attribute обезательно к заполнению",
    			'email' => 'Введите коректный email адрес',
    			'max' => 'В поле :attribute максимально допустимое кол-во символов - :max'
    		];

    		$this->validate($request, [
    			'name' => 'required | max: 60',
    			'email' => 'required | email',
    			'message' => 'required | max:255'
    			], $messages);

    		$data = $request->all();

	    	$result = Mail::send(env("THEME").'.email', [ 'data' => $data], function ($message) use ($data) {
    		    $mail_admin = env('MAIL_ADMIN');

    		    $message->from( $data['email'], $data['name']);
    		    $message->to($mail_admin)->subject($data['email']);

    		});

    		if($result){
    			return redirect()->route('contacts')->with('status', 'Email is sended');
    		}
    	}




    	$this->title = "Контакты";
    	
    	$content = view(env("THEME").'.contact_content')->render();

    	$this->contentLeftBar = view(env('THEME').'.contactBar')->render();

    	$this->vars = array_add($this->vars, 'content', $content);
		
		return $this->renderOutput();
    }


}
