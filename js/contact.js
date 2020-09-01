$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");
    $('#sucesso').hide();
    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 5
                },
                number: {
                    required: true,
                    minlength: 11
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Informe seu nome",
                    minlength: "O nome deve conter pelo menos 2 letras"
                },
                subject: {
                    required: "Informe o título",
                    minlength: "O título deve conter pelo menos 5 letras"
                },
                number: {
                    required: "Informe o telefone de contato",
                    minlength: "Informe o número DD999999999"
                },
                email: {
                    required: "Informe o e-mail",
                    email : "Informe um e-mail válido"
                },
                message: {
                    required: "Informe a observação",
                    minlength: "Não foi claro, poderia informar algo mais?"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"contact_process.php",
                    success: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                           $('#sucesso').show();
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('#sucesso').hide();
                           
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})