// Esta função verificará se o campo está
// habilitado ou desabilitado e, posteriormente,
// fará o oposto da situação atual

function geracaoAutomatica(){

    let campo = document.getElementById('IdCampo')

    // Se houver valor no campo, ele não vai desabilitar

    if(campo.value){
        /* Alert Customizado */
        disabledCb()
        Swal.fire(
            'Opa!',
            'Impossível gerar automaticamente. Remova os dados do campo e tente novamente.',
            'error'
        )
    }else{
        if(campo.hasAttribute('disabled')){
            campo.removeAttribute('disabled', 'disabled')
        }else{
            campo.setAttribute('disabled', 'disabled')
        }
    }
}

// Função para desabilitar CheckBox,
// só desabilita se o campo de texto estiver vazio
function disabledCb(){
    let ID = document.getElementById('IdCampo').value
    let checkBox = document.getElementById('cbId')

    if(ID){
        checkBox.setAttribute('disabled', 'disabled')
        checkBox.checked = false
    }else{
        checkBox.removeAttribute('disabled', 'disabled')
    }
}
    

// Contabilizando checkbox selecionados
// com exceção do ID automático!
$('html').mouseover(function() {
    
    var checkBoxes = document.querySelectorAll("input[type=checkbox]"); // Todos checkboxes do DOM
    var selecionados = 0; // Contador
    var cbId = document.getElementById('cbId') // CheckBox que deve ser separado dos outros
    var msg = false; // Bool que define a exibição da mensagem

    /* LOOP PARA VERIFICAR EM CADA ÍNDICE DO QUERYSELECTORALL
    QUAIS SÃO OS CHECKBOX QUE ESTÃO SELECIONADOS */
    checkBoxes.forEach(function(el) {
        
        /*  Caso o índice atual esteja marcado, adicionar ao contador */
        if(el.checked) {
            selecionados++;
        }
        
        /* A seguir, foram feitas verificações para separar 
        o checkbox do ID e os outros checkbox */
        if(selecionados > 3 && cbId.checked == false){
            el.checked = false; // Desmarcando CheckBox
            msg = true;
        }
        if(selecionados > 4 && cbId.checked == true){
            el.checked = false; // Desmarcando CheckBox
            msg = true;
        }

    });

    /* Caso o checkBox do ID esteja selecionado, excluí-lo do contador */
    if(cbId.checked){
        selecionados--;
    }

    if(msg == true){
        /* Alert Customizado */
        Swal.fire(
            'Ops!',
            'Você só pode selecionar 3 campos!',
            'error'
        )
    }
})