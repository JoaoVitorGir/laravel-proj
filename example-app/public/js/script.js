// na hora que o modal ModalConfirmaExclusao for iniciado vai executar esse comando
$(document).ready(function(){
    $('#ModalConfirmaExclusao').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var valores = button.data('valores');
        const form = document.getElementById('FormConfirmacao');

        //percorre todos os valores passado pelo data-valores que nesse caso é um JSON com os valores da linha selecionada
        for (const [propriedade, valor] of Object.entries(valores)) {
            
            //não precisa exibir as colunas que são FK no caso as que contém _id, para não poluir o modal de confirmação
            if (!propriedade.includes('_id')){

                // adiciona um label com o nome do campo
                const label = document.createElement('label');
                label.setAttribute('class','form-label')
                label.innerHTML = propriedade;
    
                // adiciona um input com o valor da linha a ser excluida, e é readonly para não poder ser alterado
                const input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('class', 'form-control');
                input.setAttribute('name', propriedade);
                input.setAttribute('value', valor);
                input.setAttribute('readonly', true);
    
                //div aonde vai ficar o input e o label juntos separados por um mb-1 "margin-botton"
                const div = document.createElement('div');
                div.setAttribute('class', 'mb-1 posicao-name-campo');
    
                div.appendChild(label);
                div.appendChild(input);
                
                // adiciona a div dentro da div
                form.querySelector('div').appendChild(div);
            }
        }
    });
});

// Limpa o conteúdo div dentro do form onde fica os inputs para não ter lixo quando carregar outro ID
$('#ModalConfirmaExclusao').on('hidden.bs.modal', function () {
    $(this).find('.conteudo-form').html('');
});

$(document).on('click', '.btn-lupa-pesquisar', function() {
    //metodo de limpar o compo logo a baixo deste metodo
    var campoFK = $(this).data('campo');
    var tabelaFK = $(this).data('tabela')
    // Requisição AJAX para pesquisar os possiveis valores para preenchimento daquele campo
    $.ajax({
        url: '/pesquisa/campos',
        type: 'GET',
        data: {
            campoFK: campoFK,
            tabelaFK: tabelaFK
        },
        success: function(response) {
            //alert(response + '|'+campoFK+'|'+tabelaFK)
            //console.log(response);
            const thead = document.getElementById('conteudo-campo');
            var campos_chave = [];
            
            //for para saber o nome de todos os campos vindos no array
            const tr_head = document.createElement('tr');

            for (let chaves in response[0]){
                const th_head = document.createElement('th');
                th_head.innerHTML = chaves;
                
                tr_head.appendChild(th_head);
            }
            thead.appendChild(tr_head);


            //percorre todos os valores passado pelo data-valores que nesse caso é um JSON com os valores da linha selecionada
            for (let i = 0; i < response.length; i++) {
                console.log(response[i])   
                
                for (let chave in response[0]){
                    console.log(chave +": "+ response[0][chave])
                }
//              

                //const div2 = document.createElement('div');
                
                    // for (i = 0; i < campos_chave.length; i++){
                    //     valor = valor + response[i][campos_chave[i]]
                    // }
                //console.log(valor);
                 //   div2.innerHTML = valor;

                //não precisa exibir as colunas que são FK no caso as que contém _id, para não poluir o modal de confirmação
               // div.appendChild(div2);
                
            }

            

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Erro ao pesquisar campo")
        }
    });

});

// Limpa o conteúdo div dentro do form onde fica os inputs para não ter lixo quando carregar outro ID
$('#ModalPesquisaValores').on('hidden.bs.modal', function () {
    $('#conteudo-campo').html('');
    $('#nome-colunas').html('');
});
