<?php
namespace Application\WinnerCalculation;

use Application\Board\BoardProperties;
use Application\WinnerCalculation\CrossInterface;
use Application\Board\IBoardReadOnlyRepository as Board;

class RowCrossed implements CrossInterface
{
    /**
     * Function to check whether row cross is done on board or not
     * @param Board $board
     * @return bool
     */
    public static function isCrossed(Board $board) : bool
    {
        $moves = $board->getMoves();
        if (empty($moves)) {
            return false;
        }
        for($row = 0; $row < $board->getRows(); $row++) {
            $isCrossed = false;
            for($col = 1; $col < $board->getCols(); $col++) {
                if(empty($moves[$row][$col-1])
                    || empty($moves[$row][$col])
                    || $moves[$row][$col] != $moves[$row][$col-1]
                ) {
                    $isCrossed = false;
                    break;
                }
                $isCrossed = true;
            }
            if ($isCrossed) {
                return  true;
            }
        }
        return false;
    }
}