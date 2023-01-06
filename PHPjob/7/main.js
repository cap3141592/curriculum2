// ７章チェックテスト

// 問1: isEven関数を実行して、以下の配列から偶数だけが出力されるように実装してください。

let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
let num = 0;
let i = 0;
function isEven(array) {
    while (i <= array.length) {
        num = numbers[i];
        if (num % 2 === 0) {
            console.log(num + 'は偶数です');
        }
        i++;
    }
}
// isEven(numbers);



// 問2: 以下の要件を満たすように実装してください。
// ・インスタンス化した時にガソリンとナンバーがセットされるようなCarクラスを作成する
// ・「ガソリンは〇〇です。ナンバーは△△です」と出力される「getNumGas」という関数を作成する

class Car {

    constructor(carGasoline, carNumber) {
        this.carGasoline = carGasoline;
        this.carNumber = carNumber;
    }
    
    getNumGas() {
        console.log(`ガソリンは${this.carGasoline}です。ナンバーは${this.carNumber}です`)
    }
}
// let bus1 = new Car('軽油',1234);
// bus1.getNumGas();
