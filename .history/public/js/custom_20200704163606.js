$(document).ready(function(){
    $(".dinheiro").maskMoney({
        showSymbol:true,
        symbol:"R$",
        decimal:",",
        thousands:"."});
});

$("#demo").maskMoney({ 
    prefix:'US$ ',
    suffix:"",
    formatOnBlur:false,
    allowZero:false,
    allowNegative:true,
    allowEmpty:false,
    doubleClickSelection:true,
    selectAllOnFocus:false,
    thousands: '.',
    decimal: '.' ,
    precision: 2,
    affixesStay :false,
    bringCaretAtEndOnFocus:true
    });
    