////kalkulator
let message;

///taryfa Lumi - w razie potrzeby wystarczy zmiana tych wartości ///
let tradeFee = 3.94; 
let unitPrice = 0.30;
let months = 36;
//////////
var count = document.getElementById('count');
count.addEventListener("click", function(e){

    e.preventDefault();
    let postalCode = document.getElementById('postalCode');
    let averageValue = document.getElementById('averageValue');
    let displaySavings = document.getElementById('displaySavings');
    let displayTradeFee = document.getElementById('displayTradeFee');
    let displayUnitPrice = document.getElementById('displayUnitPrice');
    let warsawMessage = document.getElementById('warsawMessage');
    let formResult = document.getElementById('formResult');
    let formWrapper = document.getElementById('formWrapper');

    if((postalCode.length !== 0) && (averageValue.length !== 0) ) {

        let checkPostalCode = parseInt(postalCode.value);
        if(checkPostalCode == 0){
            
            var savings =  (tradeFee * months) + ((unitPrice * averageValue.value)*months);
            savings = savings.toFixed(2);
            displaySavings.innerHTML=savings + " " + "zł";
            displayUnitPrice.innerHTML = unitPrice;
            displayTradeFee.innerHTML = tradeFee;
            formWrapper.classList.toggle('hide');
            formResult.classList.remove('hide');
            postalCode.value = "";
            averageValue.value = "";
        }
        else{
            message = "Oferta skierowana jest tylko dla mieszkańców Warszawy i okolic, wpisz poprawny kod";
            warsawMessage.innerHTML = message;
            postalCode.value = "";
            averageValue.value = "";
        }
    } else {
        return 
    }  
})
