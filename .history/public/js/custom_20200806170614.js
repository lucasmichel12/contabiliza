;
(function($) {
    $('.phone').mask('(99)9999-9999');
    $('.cel').mask('(99)99999-9999');
    $(".cpf").mask("999.999.999-99");
    $(".cnpj").mask("99.999.999/9999-99");
    $('.cep').mask('99999-999');
    $('.data').mask('99/99/9999');
    $('.percentual').mask("000%", { reverse: true });
    $('.dinheiro').mask("#.##0,00", { reverse: true });
})(jQuery);

$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    } );
} );