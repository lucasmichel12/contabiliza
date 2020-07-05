/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var Mask = function () {
    _initMask = function () {
        $('.cep').mask('99999-999');
        $(".cpf").mask("999.999.999-99");
        // $(".titulo-eleitor").mask("99999999999?9");
        // $(".rg").mask("99999999999999?9");
        //$(".numero").mask("##########");
        $('.cel').mask('(99)9999-9999?9');
        $('.date').mask('99/99/9999');

        $.mask.definitions['H'] = "[0-2]";
        $.mask.definitions['h'] = "[0-9]";
        $.mask.definitions['M'] = "[0-5]";
        $.mask.definitions['m'] = "[0-9]";
        $(".timepicker").mask("Hh:Mm - Hh:Mm");
    };

    //
    // Return objects assigned to module
    //
    return {
        init: function () {
            _initMask();
        }
    }
}();


// Initialize module
// ------------------------------
document.addEventListener('DOMContentLoaded', function () {
    Mask.init();
});

