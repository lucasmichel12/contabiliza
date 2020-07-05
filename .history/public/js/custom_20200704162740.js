$(document).ready(function(){
    $(".dinheiro").maskMoney({
        showSymbol:true,
        symbol:"R$",
        decimal:",",
        thousands:"."});
});