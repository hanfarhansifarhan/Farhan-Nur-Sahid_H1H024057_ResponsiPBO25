<?php
abstract class Pokemon {
    protected $name;
    protected $type;
    protected $level;
    protected $hp;
    protected $specialMove;

    public function __construct($name, $type, $level, $hp, $specialMove) {
        $this->name = $name;
        $this->type = $type;
        $this->level = $level;
        $this->hp = $hp;
        $this->specialMove = $specialMove;
    }

    public function getName() { return $this->name; }
    public function getType() { return $this->type; }
    public function getLevel() { return $this->level; }
    public function getHp() { return $this->hp; }
    public function getSpecialMove() { return $this->specialMove; }

    public function setLevel($level) { $this->level = $level; }
    public function setHp($hp) { $this->hp = $hp; }

    abstract public function specialMove();
    abstract public function train($trainType, $intensity);
}
?>