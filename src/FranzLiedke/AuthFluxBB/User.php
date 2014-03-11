<?php namespace FranzLiedke\AuthFluxBB;

use Illuminate\Auth\UserInterface as LaravelUser;
use Symfony\Component\Security\Core\User\UserInterface as SymfonyUser;

class User implements LaravelUser, SymfonyUser {

	/**
	 * The user properties as stored in the database.
	 *
	 * @var array
	 */
	protected $columns;

	/**
	 * Create a new FluxBB user.
	 *
	 * @param  array  $columns
	 * @return void
	 */
	public function __construct(array $columns)
	{
		$this->columns = $columns;
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->columns['id'];
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->columns['password'];
	}
	
	public function getRoles()
	{
		//
	}
	
	public function getPassword()
	{
		return $this->columns['password'];
	}
	
	public function getSalt()
	{
		//
	}
	
	public function getUsername()
	{
		return $this->columns['username'];
	}
	
	public function eraseCredentials()
	{
		//
	}
	
	public function equals(SymfonyUser $user)
	{
		return false;
	}

	/**
	 * Dynamically access the user's attributes.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->columns[$key];
	}

	/**
	 * Dynamically set an attribute on the user.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function __set($key, $value)
	{
		$this->columns[$key] = $value;
	}

	/**
	 * Dynamically check if a value is set on the user.
	 *
	 * @return bool
	 */
	public function __isset($key)
	{
		return isset($this->columns[$key]);
	}

	/**
	 * Dynamically unset a value on the user.
	 *
	 * @return bool
	 */
	public function __unset($key)
	{
		unset($this->columns[$key]);
	}

}
