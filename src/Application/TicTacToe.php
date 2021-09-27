<?php
namespace Application;

use \Application\AppException;
use Application\WinnerCalculation\ColumnCrossed;
use Application\WinnerCalculation\DiagonalCrossed;
use Application\WinnerCalculation\RowCrossed;
use Application\Board\Board;

class TicTacToe {
    /**
     * function to start a new game by clearing a board
     */
    public function startNewGame()
    {
        Board::getSingleton()->clear();
    }

    /**
     * Checks if there is a win by an user who has done a moves any of
     * covering full rows, full columns or complete diagonal
     * @return bool
     */
    public function checkForWinner() : bool
    {
        if (Board::getSingleton()->getMoveCount() < min(Board::getSingleton()->getRows(), Board::getSingleton()->getCols())) {
            return false;
        }
        return RowCrossed::isCrossed(Board::getSingleton())
            || ColumnCrossed::isCrossed(Board::getSingleton())
            || DiagonalCrossed::isCrossed(Board::getSingleton());
    }

    /**
     * A draw is determined if all moves on a board is done (no moves left to draw on board)
     * and no winner
     * @return bool
     */
    public function checkForDraw() : bool
    {
        if (Board::getSingleton()->getMoveCount() < Board::getSingleton()->getRows() * Board::getSingleton()->getCols()) {
            return false;
        }
        return !$this->checkForWinner();
    }

    /**
     * Restarts all of our board object data to an early state,
     * before information had been set.
     */
    public function _resetStartupData()
    {
        Board::getSingleton()->clear();
    }

    /**
     * return the information with the score of each user
     * @return array
     */
    public function finalScore() : array
    {
        // TO DO

    }
}
