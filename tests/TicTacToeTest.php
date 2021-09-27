<?php

use \Application\User\UserFactory;
use PHPunit\Framework\TestCase;
use Application\TicTacToe;
use Application\Board\Board;

class TicTacToeTest extends TestCase {
    private $rows  = 3,
            $cols = 3;
    private $user1;
    private $user2;
    private $obj;
    public function __construct()
    {
        parent::__construct();
        $this->obj = new TicTacToe();
        $this->user1 = UserFactory::create(
            [
                'user_type' => \Application\User\User::$USER_TYPE,
                'name' => "user1",
                'uid' => 1,
                'marker' => 'O',
            ]);
        $this->user2 = UserFactory::create(
            [
                'user_type' => \Application\User\User::$USER_TYPE,
                'name' => "user2",
                'uid' => 2,
                'marker' => 'O',
            ]);
        Board::getSingleton()->init($this->rows, $this->cols);
    }

    public function setup() : void
    {
        $this->obj->startNewGame();
    }

    public function testGameWinForUser1()
    {
        Board::getSingleton()->makeMove($this->user1, 0, 0);
        Board::getSingleton()->makeMove($this->user2, 1, 1);
        Board::getSingleton()->makeMove($this->user1, 0, 1);
        Board::getSingleton()->makeMove($this->user2, 1, 2);
        Board::getSingleton()->makeMove($this->user1, 0, 2);
        $this->assertTrue($this->obj->checkForWinner());
    }


    public function testGameWinForUser2()
    {
        Board::getSingleton()->makeMove($this->user2, 0, 2);
        Board::getSingleton()->makeMove($this->user1, 1, 1);
        Board::getSingleton()->makeMove($this->user2, 2, 2);
        Board::getSingleton()->makeMove($this->user1, 2, 1);
        Board::getSingleton()->makeMove($this->user2, 1, 2);
        $this->assertTrue($this->obj->checkForWinner());
    }


    public function testGameDraw()
    {
        Board::getSingleton()->makeMove($this->user1, 0, 0);
        Board::getSingleton()->makeMove($this->user2, 0, 1);
        Board::getSingleton()->makeMove($this->user1, 1, 1);
        Board::getSingleton()->makeMove($this->user2, 2, 2);
        Board::getSingleton()->makeMove($this->user1, 2, 0);
        Board::getSingleton()->makeMove($this->user2, 0, 2);
        Board::getSingleton()->makeMove($this->user1, 1, 2);
        Board::getSingleton()->makeMove($this->user2, 1, 0);
        Board::getSingleton()->makeMove($this->user1, 2, 1);
        $this->assertFalse($this->obj->checkForWinner());
        $this->assertTrue($this->obj->checkForDraw());
    }
}