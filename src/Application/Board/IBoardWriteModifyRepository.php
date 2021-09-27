<?php

namespace Application\Board;

use Application\User\User;


interface IBoardWriteModifyRepository
{
    /**
     * Initialize board
     * @param int $rows
     * @param int $cols
     * @return bool
     */
    public function init(int $rows, int $cols) : bool;

    /**
     * cleared the board and its properties set previously
     * @return bool
     */
    public function clear() : bool;

    /**
     * A user makes a move on a board
     * @param User $user
     * @param $row
     * @param $col
     * @return bool
     */
    public function makeMove(User $user, $row, $col) : bool;
}