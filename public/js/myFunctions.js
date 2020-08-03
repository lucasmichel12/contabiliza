function excluir(link) {
    bootbox.confirm({
        title: "<strong>Opa, você está certo do que está fazendo?</strong>",
        message: "Registros vinculados à alguma solicitação não poderam ser excluidos, registros excluidos não podem ser recuperados.",
        buttons: {
            confirm: {
                label: 'Excluir',
                className: 'btn-danger'
            },
            cancel: {
                label: 'Cancelar',
                className: 'btn-success'
            }
        },
        callback: function(result) {
            if (result) {
                window.location = link
            }
        }
    });
}


function desabilitar(link) {
    bootbox.confirm({
        title: "<strong>Opa, você está certo do que está fazendo?</strong>",
        message: "Registros desabilitados podem ser reabilitados na opção <strong>Editar</strong>",
        buttons: {
            confirm: {
                label: 'Desabilitar',
                className: 'btn-danger'
            },
            cancel: {
                label: 'Cancelar',
                className: 'btn-success'
            }
        },
        callback: function(result) {
            if (result) {
                window.location = link
            }
        }
    });
}

function alerta(msg){
    bootbox.alert({
        title: "<strong>Houve problemas com sua solicitação</strong>",
        message: msg,
    });
}