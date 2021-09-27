<?php
namespace Application\User;

interface IUserWriteModifyRepository
{
    /**
     * Create a user
     */
    public static function create(array $data) : User;

    /**
     * Delete a user
     */
    public static function delete(User $user);

}