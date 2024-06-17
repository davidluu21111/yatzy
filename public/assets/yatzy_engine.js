class YatzyGame {
   constructor() {
       this.turn = 0;
       this.dice = [0, 0, 0, 0, 0];
       this.keep = [false, false, false, false, false];
   }

   rollDice() {
       if (this.turn >= 3) {
           console.log("No more rolls left in this turn");
           return;
       }
       for (let i = 0; i < 5; i++) {
           if (!this.keep[i]) {
               this.dice[i] = Math.floor(Math.random() * 6) + 1;
           }
       }
       this.turn++;
   }

   toggleKeep(index) {
       if (index >= 0 && index < 5) {
           this.keep[index] = !this.keep[index];
       }
   }
}

window.YatzyGame = YatzyGame; // Make it accessible in the test.html
