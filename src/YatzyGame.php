<?php
class YatzyGame {
    private $leaderboard = [];
    private $scores = [];

    public function rollDice() {
        return array_map(function() {
            return rand(1, 6);
        }, range(1, 5));
    }

    public function addScore($playerName, $score) {
        $this->leaderboard[] = ['player' => $playerName, 'score' => $score];
    }

    public function getLeaderboard() {
        usort($this->leaderboard, function($a, $b) {
            return $b['score'] - $a['score'];
        });
        return $this->leaderboard;
    }

    public function getScores() {
        return $this->scores;
    }

    public function addRollResult($player, $result) {
        if (!isset($this->scores[$player])) {
            $this->scores[$player] = [];
        }
        $this->scores[$player][] = $result;
    }
}
?>
