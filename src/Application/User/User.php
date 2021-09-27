<?php

namespace Application\User;

use \Application\AppException;
use Application\User\IUserWriteModifyRepository, Application\User\IUserReadOnlyRepository;

class User implements IUserReadOnlyRepository {
    public static $USER_TYPE = "human";
    protected $_name,
			  $_uid,
			  $_marker = '?';

    public function __construct($data)
    {
        $this->_name = $data['name'] ?? null;
        $this->_uid = $data['uid'] ?? null;
        $this->_marker = $data['marker'] ?? null;
    }

	/**
	 * Returns a name of the User
	 * 
	 * @return string
	 */
	public function getName()
    {
		return $this->_name;
	}

	/**
	 * Returns a Id of the User
	 * 
	 * @return int
	 */
	public function getId()
    {
		return $this->_uid;
	}

	/**
	 * Returns the marker character
	 * 
	 * @return string
	 */
	public function getMarker()
    {
		return $this->_marker;
	}
}