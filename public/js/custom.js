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