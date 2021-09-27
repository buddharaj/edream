<?php
namespace Application\WinnerCalculation;
use Application\Board\IBoardReadOnlyRepository as Board;

interface CrossInterface
{
    /**
     * To check whether a user made a cross on board or not
     * @param Board $board
     * @return bool
     */
    public static function isCrossed(Board $board) : bool;
}