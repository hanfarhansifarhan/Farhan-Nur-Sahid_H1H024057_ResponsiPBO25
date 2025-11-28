<?php
require_once __DIR__ . '/Pokemon.php';

class BugPoisonPokemon extends Pokemon {
    public function __construct($name, $level, $hp) {
        parent::__construct($name, 'Bug / Poison', $level, $hp, 'Harden');
    }

    public function specialMove() {
        return "Kakuna menggunakan Harden! Jurus status yang membuat cangkang Kakuna mengeras sebagai pertahanan.";
    }

    public function train($trainType, $intensity) {
        $oldLevel = $this->level;
        $oldHp = $this->hp;

        if ($trainType == 'Defense') {
            $this->level += $intensity * 2;
        } elseif ($trainType == 'Attack') {
            $this->level += $intensity * 0.5;
        } elseif ($trainType == 'Speed') {
            $this->level += $intensity * 0.5;
        }
        $this->hp += $intensity * 15;

        return [
            'oldLevel' => $oldLevel,
            'newLevel' => $this->level,
            'oldHp' => $oldHp,
            'newHp' => $this->hp
        ];
    }
}
?>