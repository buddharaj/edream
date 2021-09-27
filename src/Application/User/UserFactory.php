<?php

namespace Application\User;
use \Application\AppException;
use Application\User\IUserWriteModifyRepository;
use Application\User\User;

class UserFactory implements IUserWriteModifyRepository {
    /**
     * Create a user
     * @param array $data
     * @return \Application\User\User
     */
    public static function create($data) : User
    {
        // if user is human, create human object
        if ($data['user_type'] == User::$USER_TYPE) {
            return new User($data);
        } else if (false) {
            // TO DO -> if user is computer, create computer object
        }
    }

    /**
     * delete the user
     * @param \Application\User\User $user
     */
    public static function delete(User $user)
    {
        unset($user);
        /** this is to store the user details for future - commented purposefully */
//        $_SESSION[User::USER_TYPE][$userId] = null;
    }

/*    public static function getUserInfo($userId)
    {
        return $_SESSION[User::USER_TYPE][$userId] ?? false;
    }*/

/*    public static function save(User $user)
    {
        $_SESSION[User::USER_TYPE][$user->getId()]['info'] = $user;
    }*/

/*    public static function saveUserScore($userId)
    {
        if (isset($_SESSION[User::USER_TYPE][$userId])) {
            $_SESSION[User::USER_TYPE][$userId]['score'] +=  isset($_SESSION[User::USER_TYPE][$userId]['score']) ? $_SESSION[User::USER_TYPE][$userId]['score'] + 1 : 1;
        }
    }*/

}
