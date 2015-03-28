<?php
	class user{
		public $db;
		private $_cookie, $_data, $_logIn,$_rank;
	
		public function __construct(){
			require 'db.class.php';
			require 'cookie.class.php';
			$this->db = db::getInstance();
			$this->_cookie = new Cookies();
		}
		
		public function getRank(){
			$this->db->query("SELECT * FROM Users");
			return $this->_rank;
		}
		public function login($user, $pass){
			$q =$this->db->query("SELECT * FROM Users WHERE UserName =".$user."")->result();
			if(!isset($_COOKIE['user'])){
				if($q->rowCount() <= 1){
					$userinfo = $q->fetchAll();
					if(password_verify($userinfo['password'], 'sha256')){
						$this->_cookie->cookieDay("user", $user, '30');
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}else{
				$this->_logIn = true;
				return false;
			}
		}
		public function isLoggedIn(){
			return $this->_logIn;
		}
		
	}
?>