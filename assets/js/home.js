



(function () {
    getProducts();
    function getProducts() {
        $.get('/home/products').done(OnGetProd);
    }
    function OnGetProd(data) {
        console.log(data);
        if (data['name'] !== undefined){
            data.forEach(prod => {
                let p = new Prod(prod['name'], prod['cost'], prod['unit']);
            });
        }
    }
    class Prod{
        constructor (name, cost, unit) {
            this.name = name;
            this.cost = cost;
            this.unit = unit;
            this._initProd();
        }
        _initProd () {
            this.node = $('<div class="object p-0 mr-2 mb-2 d-flex align-items-center">' + this.name +" "+" "+this.unit + this.cost + '</div>').appendTo($('.buildings-wrapper')[0]);
            }
    }

})