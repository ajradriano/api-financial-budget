$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function() {
    var meuBotao = $('#menuBotao');

    meuBotao.on('mouseover', function() {
        // Adiciona o texto "Adicionar" de forma animada
        $(this).append('<span class="tooltip-text">Adicionar</span>');
    });

    meuBotao.on('mouseout', function() {
        // Remove o texto "Adicionar" ao retirar o mouse
        $(this).find('.tooltip-text').remove();
    });
});