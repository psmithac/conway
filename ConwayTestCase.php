<?php

use PHPUnit\Framework\TestCase;

class ConwayTestCase extends TestCase
{
  public static function setUpBeforeClass() : void
  {
      require_once 'conway.php';
  }
  
  protected $cell;
  
  protected function setUp() : void
  {
    $this->cell = new ConwayCell();
    $this->cell->setLife(true);
  }
  
  public function testLessThanTwoLiveNeighborsDies()
  {
    $this->cell->setLiveNeighbors(1);
    $this->cell->getNewState();
    $this->assertFalse($this->cell->getLife());
  }
  
  public function testMoreThanThreeLiveNeighborsDies()
  {
    $this->cell->setLiveNeighbors(4);
    $this->cell->getNewState();
    $this->assertFalse($this->cell->getLife());
  }
  
  public function testLiveWithTwoOrThreeLiveNeighborsLives()
  {
    $this->cell->setLiveNeighbors(2);
    $this->cell->getNewState();
    $this->assertTrue($this->cell->getLife());
    
    $this->cell->setLiveNeighbors(3);
    $this->cell->getNewState();
    $this->assertTrue($this->cell->getLife());
  }
  
  public function testDeadWithThreeLiveNeighborsLives()
  {
    $this->cell->setLife(false);
    $this->cell->setLiveNeighbors(3);
    $this->cell->getNewState();
    $this->assertTrue($this->cell->getLife());
  }
}