<?php

namespace SGA\Http\Controllers\Auth;

use Illuminate\Http\Request;
use SGA\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use SGA\Models\Admin;


class LoginController extends Controller {
	use AuthenticatesUsers;

	protected $redirectTo = '/home';

	public function __construct() {
		$this->middleware( 'guest' )->except( 'logout' );
	}

	protected function credentials( Request $request ) {
		$data                 = $request->only( $this->username(), 'password' );
		$usernameKey          = $this->usernameKey();
		$data[$usernameKey]   = $data[ $this->username() ];
		$data['userable_type']= Admin::class;
		unset($data[ $this->username()]);

		return $data;
	}

	protected function usernameKey() {
		$email     = \Request::get( $this->username() );
		$validator = \Validator::make( [
			'email' => $email
		], [ 'email' => 'email' ] );

		return $validator->fails() ? 'enrolment' : 'email';
	}

	public function username() {
		return 'username';
	}
}