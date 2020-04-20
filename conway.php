<?php

/**
 * Implements a Game of Life cell
 */
class ConwayCell
{
  private $is_alive;
  private $live_neighbors;
  
  public function getNewState()
  {
    $this->checkForLife();
  }
  
  private function checkForLife()
  {
    if ($this->is_alive) {
      $this->makeDeadIfFewerThanTwoLiveNeighbors();
      $this->makeDeadIfGreaterThanThreeLiveNeighbors();
    } else {
      $this->makeLiveIfThreeLiveNeighbors();
    }
    
    return $this->is_alive;
  }
  
  public function getLife()
  {
    return $this->is_alive;
  }
  
  public function setLife($state)
  {
    $this->is_alive = $state;
  }
  
  public function getLiveNeighbors() {
    return $this->live_neighbors;
  }
  
  public function setLiveNeighbors($new_live_neighbors) {
    $this->live_neighbors = $new_live_neighbors;
  }
  
  private function makeDeadIfFewerThanTwoLiveNeighbors()
  {
    if ($this->getLiveNeighbors() < 2) {
      $this->setLife(false);
    }
  }
  
  private function makeDeadIfGreaterThanThreeLiveNeighbors()
  {
    if ($this->getLiveNeighbors() > 3) {
      $this->setLife(false);
    }
  }
  
  private function makeLiveIfThreeLiveNeighbors()
  {
    if ($this->getLiveNeighbors() == 3) {
      $this->setLife(true);
    }
  }
}
