<?php

namespace Application\Board;

use Application\Board\Board;

interface IBoardReadOnlyRepository
{
    /**
     * Get a single object of a board
     * @return Board
     */
    public static function getSingleton() : Board;

    /**
     * get current moves made by users on a board
     * @return array
     */
    public function getMoves() : array;

    /**
     * Get total rows of a board
     * @return int
     */
    public function getRows() : int;

    /**
     * Get total columns of a board
     * @return int
     */
    public function getCols() : int;

    /**
     * Get total moves made so far on a board
     * @return int
     */
    public function getMoveCount() : int;
}