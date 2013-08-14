<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=Users::model()->findByAttributes(array('email'=>$this->username, 'password' => md5($this->password))); 
		if($user===null)
        {
        	$this->errorCode=self::ERROR_USERNAME_INVALID;
        }
		else
		{
			$this->_id=$user->id;
			$this->setState('roles', trim($user->role));
			$this->setState('email', $user->email);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()       //  override Id
	{
		return $this->_id;
	}
}