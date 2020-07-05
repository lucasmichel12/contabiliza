// $(document).ready(function () {
//     $('.phone').mask('(99)9999-9999');
//     $('.cel').mask('(99)99999-9999');
//     $(".cpf").mask("999.999.999-99");
//     $('.cep').mask('99999-999');
//     $('.data').mask('99/99/9999');
//     $('.dinheiro').mask("#.##0,00", { reverse: true });
// }); 

$(function() {
    $("#money").inputmask('decimal', {
        'alias': 'decimal',
        'radixPoint': ','
        'groupSeparator': '.'
        'autoGroup': true,
        'digits': 2,
        'digitsOptional': false,
        'rightAlign': false
        'placeholder': '0'
});
// $(document).ready(function () {
//     $('.phone').mask('(99)9999-9999');
//     $('.cel').mask('(99)99999-9999');
//     $(".cpf").mask("999.999.999-99");
//     $('.cep').mask('99999-999');
//     $('.data').mask('99/99/9999');
//     $('.dinheiro').mask("#.##0,00", { reverse: true });
// }); 