function rollDice() {
   const result = [];
   for (let i = 0; i < 5; i++) {
       result.push(Math.floor(Math.random() * 6) + 1);
   }
   return result;
}
