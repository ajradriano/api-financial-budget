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

function setHeaders() {
    let token = sessionStorage.getItem('token');
    console.log(22212)
    $.ajaxSetup({
        headers: {
            'Authorization': 'Bearer ' + token
        }
    });
}

$('#logoutBtn').on('click', function() {
    Swal.fire({
        title: 'Você tem certeza?',
        text: 'As alterações não salvas serão perdidas!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, sair!',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'api/logout',
                type: 'POST',
                headers: {
                    'Authorization' : 'Bearer ' + sessionStorage.getItem('token')
                },
                success: function(data) {
                    sessionStorage.removeItem('token');
                    window.location.href = 'login';
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro ao fazer logout',
                    text: 'Não foi possível fazer logout, tente novamente mais tarde',
                })
            });
        }

    });  
    
});