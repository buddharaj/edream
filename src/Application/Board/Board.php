<?php

namespace Application\Board;

use \Application\AppException;
use Application\User\User;

class Board implements IBoardWriteModifyRepository, IBoardReadOnlyRepository
{
    protected $_rows,
              $_cols;
    private static $obj;
    protected $_moves = array(array());
    protected $_moveCount = 0;
    protected $_lastPlayedUser;

    private function __construct() { }

    /**
     * As board will be only one in the game, only one object should be created for board
     * @return Board
     */
    public static function getSingleton() : self
    {
        if (!isset(self::$obj)) {
            self::$obj = new Board();
        }
        return self::$obj;
    }

    /**
     * Sets up / Initialize our game board's width and height
     * @param int $rows - How many horizontal available to draw
     * @param int $cols - How many vertical available to draw
     * @return bool
     */
    public function init($rows, $cols) : bool
    {
        try {
            $this->_rows = $rows;
            $this->_cols = $cols;
            $this->_moveCount = 0;
            $this->_lastPlayedUser = null;
            return true;
        } catch (AppException $exception) {
            return false;
        }
    }

    /**
     * Clears the board of all moves and other require properties modified in last game
     * @return bool
     */
    public function clear() : bool
    {
        try {
            $this->_moves = array(array());
            $this->_moveCount = 0;
            $this->_lastPlayedUser = null;
            return true;
        } catch (AppException $exception) {
            return false;
        }
    }

    /**
     * Takes a move for a user, does all of the necessary checks first!
     * 
     * @param User $user - The use of interface user
     * @param int $row
     * @param int $col
     * @return bool
     */
    public function makeMove(User $user, $row, $col) : bool
    {
        if(!is_int($row)
            || !is_int($col)
            || !$this->_checkMoveNotExists($row, $col)
            || !$this->_checkBounds($row, $col)
        ) {
            return false;
        }

        //Make our move, adds user to tile by ID
        $this->_moves[$row][$col] = $user->getId();
        $this->updateMoveCount();
        $this->_lastPlayedUser = $user;
        return true;
    }

    /**
     * Returns the height of the board
     * 
     * @return int - The height of the board
     */
    public function getCols() : int
    {
        return $this->_cols;
    }

    /**
     * Returns the width of the board
     * 
     * @return int - The width of the board
     */
    public function getRows() : int
    {
        return $this->_rows;
    }


    /**
     * Returns the moves array of the board
     * @return array[]
     */
    public function getMoves() : array
    {
        return $this->_moves;
    }

    /**
     *  Update move counter after every successfull move played by user
     * @return int
     */
    protected function updateMoveCount()
    {
        return $this->_moveCount += 1 ;
    }

    /**
     * Get Move count to know how many moves has made on board so far
     * @return int - The height of the board
     */
    public function getMoveCount() : int
    {
        return $this->_moveCount ;
    }


    /**
     * Checks if a move is within bounds
     * @param int $row
     * @param int $col
     * @return bool
     */
    protected function _checkBounds($row, $col) : bool
    {
        if($row < 0
            || $row >= $this->_rows
            || $col < 0
            || $col >= $this->_cols
        ) {
            return false;
        }
        return true;
    }

    /**
     * Checks if a move has already been filled
     * @param int $row
     * @param int $col
     * @return bool
     */
    protected function _checkMoveNotExists($row, $col)  : bool
    {
        return empty($this->_moves[$row][$col]);
    }
}