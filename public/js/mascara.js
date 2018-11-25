$(document).ready(function(){
    var maskBehavior2 = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior2.apply({}, arguments), options);
        }
        };

    $('.telefone').mask(maskBehavior2, options);


    $('.ddd').mask('00');

    $('.cnpj').mask('99.999.999/9999-99');
    $('.cpf').mask('999.999.999-99');

    $("#cep").mask('99999-999');


    var maskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 9 ? '00000-0000' : '0000-00009';
        },
        options = {onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior.apply({}, arguments), options);
        }
        };

    $('.telSemDDD').mask(maskBehavior, options);
});