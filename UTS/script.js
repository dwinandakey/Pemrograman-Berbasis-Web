let x = 20; // variabel x dengan scope global

function contohScope() {
    var x = 30; // variabel x dengan scope lokal di dalam function contohScope
    console.log(x); // Output: 30

    if(true) {
        // Kita tidak bisa mendeklarasikan ulang x untuk block statement
        // karena masih dianggap scope yang sama dengan function contohScope
        x = 40;
        console.log(x); // Output: 40
    }

    console.log(x); // Output: 40
}

contohScope();

console.log(x); // Output: 20
