<?php
class Token{
	public static function generate() {
		return Session::put(Config::get('Session/token_name'),md5(uniqid()));
	}
	public static function check($token) {
		$tokenName = Config::get('Session/token_name');
		if(Session::exsits($tokenName) && $token === Session::get($tokenName)) {
			Session::delete($tokenName);
			return true;
		}
		
		return false;
	}
	
}
?>