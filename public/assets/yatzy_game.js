function calculateScore(dice, category) {
   switch (category) {
       case 'ones':
           return dice.filter(die => die === 1).length;
       case 'twos':
           return dice.filter(die => die === 2).length * 2;
       case 'threes':
           return dice.filter(die => die === 3).length * 3;
       case 'fours':
           return dice.filter(die => die === 4).length * 4;
       case 'fives':
           return dice.filter(die => die === 5).length * 5;
       case 'sixes':
           return dice.filter(die => die === 6).length * 6;
       default:
           return 0;
   }
}

function updateOverallScore(game) {
   let upperSection = ['ones', 'twos', 'threes', 'fours', 'fives', 'sixes'];
   game.score = upperSection.reduce((total, category) => {
       return total + calculateScore(game.dice, category);
   }, 0);
   game.bonus = game.score >= 63 ? 35 : 0;
   game.totalScore = game.score + game.bonus;
}

window.calculateScore = calculateScore; // Make it accessible in the test.html
window.updateOverallScore = updateOverallScore; // Make it accessible in the test.html
