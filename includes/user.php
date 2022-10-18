<?php
 include_once 'includes/MYPDO.php';
 include_once 'includes/Model.php';

 
 class User extends Model {
	 	protected $userid;
	 	public $name;
    public $email;
	 	public $password;
	 	public $created_at;
	 	public $modified_at;
	 	public $hash;
	 	
	 	public $error = array();

	 	protected static $class_name = 'User';
		protected static $primary_key = 'userid';
		protected static $table_name = 'users';
		protected static $table_fields  = array(
      'userid','name','email','password','created_at','modified_at','user_session_id'
      );

		function __construct()
	 	{
	 		# code...
	 		parent::__construct();
	  }

    public function getUserId(){
      return $this->userid;
    }

		public function setNewUserId(){

			if($lastuser = static::last()){
				$lastId = explode ('/',$lastuser->userid);
			
				if(strlen(++$lastId[1])<3 ){ 
					$this->userid = 'user/'.str_repeat('0', 3-strlen($lastId[1])).$lastId[1];
				}
				else{
					$this->userid = 'user/'.$lastId[1];
				}
			}else{
				$this->userid = 'user/001'; 
			}

		}

		public static function authenticate($password, $email){
	 		$password = md5($password);
	 		$sql = " SELECT * FROM ".static::$table_name." 
        WHERE email = '$email' AND password = '$password'  LIMIT 1";
	 		$user = static::findBySql($sql); 
	 		return ($user) ? array_shift($user) : false;
	 	}

	 	public function insertUser(){
	 		$this->setNewUserId();

	 		$this->password = md5($this->password);
	 		$this->hash = md5($this->email);
	 		return ($this->create())? true : false;
	 	}

	 	public static function findByEmail($email){
	 		$sql = "SELECT * FROM ".static::$table_name." WHERE email = '$email'  LIMIT 1";
	 		$staff = static::findBySql($sql);
	 		return ($staff) ? array_shift($staff) : false;
	 	}

    public function updateUserToken($token){
			$this->user_session_id = $token;
			return ($this->update())? true : false;
		}

	 public static function findUserById($userid){
		$sql = "SELECT * FROM " . static::$table_name . " WHERE userid = '$userid'  LIMIT 1";
		$staff = static::findBySql($sql);
		return ($staff) ? array_shift($staff) : false;
	 }
  
	
  }