export class X {
    constructor(transactions) {
        this.transactions = transactions;
    }
    support(...items) {
        let count = 0;
        this.transactions.forEach((t) => {
            if (items.every((i) => t.includes(i))) {
                count += 1;
            }
        });
        return count / this.transactions.length;
    }

    confidence(antendence, consequence) {
        return (
            this.support(...antendence, ...consequence) /
            this.support(...antendence)
        );
    }
    lift(antendence, consequence) {
        return (
            this.support(...antendence, ...consequence) /
            (this.support(...antendence) * this.support(...consequence))
        );
    }
    
}
