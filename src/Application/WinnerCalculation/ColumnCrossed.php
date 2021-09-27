<?php
namespace Application\WinnerCalculation;

use Application\Board\IBoardReadOnlyRepository as Board;
use Application\WinnerCalculation\CrossInterface;
use Application\WinnerCalculation;

class ColumnCrossed implements CrossInterface
{
    /**
     * Function to check whether column cross is done on board or not
     * @param Board $board
     * @return bool
     */
    public static function isCrossed(Board $board) : bool
    {
        $moves = $board->getMoves();
        if (empty($moves)) {
            return false;
        }
        for($col = 0; $col < $board->getCols(); $col++) {
            $isCrossed = false;
            for($row = 1; $row < $board->getRows(); $row++) {
                if(empty($moves[$row][$col])
                    || empty($moves[$row-1][$col])
                    || $moves[$row][$col] != $moves[$row-1][$col]
                ) {
                    $isCrossed = false;
                    break;
                }
                $isCrossed = true;
            }
            if ($isCrossed) {
                return true;
            }
        }
        return false;
    }
}