<?php
namespace Application\WinnerCalculation;

use Application\Board\BoardProperties;
use Application\WinnerCalculation\CrossInterface;
use Application\Board\IBoardReadOnlyRepository as Board;

class DiagonalCrossed implements CrossInterface
{
    /**
     * Function to check whether Diagonal cross is done on board or not
     * @param Board $board
     * @return bool
     */
    public static function isCrossed(Board $board) : bool
    {
        $moves = $board->getMoves();
        if (empty($moves)) {
            return false;
        }
        for($row = 1; $row < $board->getRows(); $row++) {
            $isCrossed = false;
            for($col = 1; $col < $board->getCols(); $col++) {
                if($row != $col
                    || empty($moves[$row][$col])
                    || empty($moves[$row-1][$col-1])
                    || $moves[$row-1][$col-1] != $moves[$row][$col]
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