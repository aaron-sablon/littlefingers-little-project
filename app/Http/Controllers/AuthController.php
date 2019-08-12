<?php

namespace App\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Input;
use Crypt;

use App\User;
use Mail;

class AuthController extends Controller
{

	public function __construct()
	{
		$this->params = config('app.params');
	}

	function login() {

		$password = Input::get('password', null);
		$email = Input::get('email', null);

		if ( !trim($email) || !trim($password) ) {

			$this->params['msg'] = 'Email or password is required.';
			$this->params['error'] = true;
			return response()->json( $this->params );
		}
		
		$email = strtolower($email);
		$user = User::where( 'email', $email )->first();

		if ( !$user || $user->password == null || $user->password == '' ) {

			$this->params['msg'] = 'Email and password do not match.';
			$this->params['error'] = true;
			return response()->json( $this->params );
		}

		$decrypted_password = Crypt::decrypt( $user->password );

		if ( $password !== $decrypted_password ) {

			$this->params['msg'] = 'Invalid Credentials. Please make sure you entered the right information.';
			$this->params['error'] = true;
			return response()->json( $this->params );
		}

		
		// Now, let's generate token.
		try {

			$token = JWTAuth::fromUser($user);

			// attempt to verify the credentials and create a token for the user
			if (! $token ) {
				$this->params['msg'] = 'Unable to process request at this time. Please try again later.';
				$this->params['error'] = true;
				return $this->params;
			}
		} catch (JWTException $e) {
			
			// something went wrong whilst attempting to encode the token
			$this->params['msg'] = 'Unable to process request at this time. Please try again later.';
			$this->params['error'] = true;
			return $this->params;
		}
		
		$this->params['is_logged'] = true;
		$this->params['msg'] = 'Log in successful.';
		$this->params['token'] = $token;

		$this->params['user'] = $user;
		return $this->params;
	}

	function logout() {

		// Mail::raw('Text to e-mail', function ($message) {
		//     $message->from('josh@cornercanyonconsulting.com', 'Administrator');
		//     $message->to('born010code@gmail.com');
		// });
		// $msg = 'sample test for open.';
		// $data = [];
		// Mail::send('emails.blank', array('msg' => $msg), function($message) use ($data)
		// {
		// 	$message->setContentType('text/html');
		// 	// $message->setBody( $template->html, 'text/html');
		// 	$message->subject('Smaple Subject Tester');
		// 	$message->from('josh@cornercanyonconsulting.com', 'Administrator');
		//     $message->to('born010code@gmail.com');
		// });

		$token = Input::get('token', null);
		// $token = $this->params['token'];

		if ( $token ) {
			
			try {

				JWTAuth::setToken( $token )->invalidate();
				$this->params['user'] = null;
				return $this->params;
			} catch (JWTException $e) {

			}
		}

		$this->params['token'] = null;
		$this->params['error'] = true;
		$this->params['msg'] = 'Log out successful.';

		return $this->params;
	}
}
