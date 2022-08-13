/* Arquivo para as requisições da tabela de finanças */

const token = document.querySelector('meta[name="csrf-token"]').content /* Token:
O token serve como uma numeração, uma ficha para mais segurança
nos meios digitais quando pensamos em formulários
*/

window.onload = function() {
    dataTable();
}

/* Trazendo dados para a tabela */
function dataTable()
{    
    // Definindo a tabela no documento HTML
    let tabela = document.getElementById('tabela')  
    /* O fetch é feito com o método get, 
    então não é necessário body, apenas
    acessaremos os dados. */
    fetch(`/financeiros/datatable`, {
        headers: {
            "Content-Type": "application/json; charset=utf-8",
            "X-CSRF-Token": token
        },
        method: 'GET',
    })
    // Tentará trazer os dados e inseri-los na tabela
    .then(response => response.json())    
    .then(data => {
        tabela.innerHTML = ''
        data.dados.forEach(item => {
            tabela.innerHTML += `<th scope="row">${item.id}</th>
            <td>${item.name}</td>
            <td>${item.gasto_1}</td>
            <td>${item.gasto_2}</td>
            <td>${item.gasto_3}</td>
            <td>${item.gasto_4}</td>
            <td><span style="color: rgb(208, 255, 0);" class="glyphicon glyphicon-print" aria-hidden="true"></span></td>
            <td><span style="color: rgb(4, 0, 255);" onclick="editarDados(${item.id})" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>
            <td><span style="color: rgb(241, 0, 0);" onclick="deletarDados(${item.id})" class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>`
        })
    })   
    .catch(error => console.log(error)) // Retornando mensagem de erro
}

/* Enviar dados por arquivo XML */
function EnviarXml(){
    /* Campo de xml do formulário
    Iniciando formData para enviar arquivos */
    let xmlFile = document.getElementById('xmlFile')
    let formData = new FormData()

    formData.append("xmlFile", xmlFile.files[0])

    // O fetch vai definir a rota. No caso
    // é nossa rota definida no arquivo de rotas
    // e no controller
    fetch(`/financeiros/store`, 
    {
        headers: {
            contentType: false,
            processData: false,
            "X-CSRF-Token": token
        },
        method: 'POST',
        body: formData
    })
    // Tentará trazer o dados (neste caso, a resposta da requisição)
    .then(response => response.json())
    .then(data => {
        Swal.fire(
            data.title,
            data.resposta,
            data.tema
        )
    })
    .catch(error => console.log(error)), // Mensagem caso retorne erro
    dataTable() // Atualizando a tabela para incluir o novo dado
}

function deletarDados(id){
    fetch(`/financeiros/destroy/` + id, 
    {
        method: 'DELETE',
        headers: 
        {
            'Accept': 'application/json',
            "Content-Type": "application/json; charset=UTF-8",
            "X-CSRF-Token": token
        }
    })
    // Tentará trazer o dados (neste caso, a resposta da requisição)
    .then(response => response.json())
    .then(data => {
        Swal.fire(
            data.title,
            data.resposta,
            data.tema
        )    
    })
    .catch(error => console.log(error)) // Mensagem caso retorne erro
    dataTable() // Atualizando a tabela para incluir o novo dado
}

/* Função para formulário
feito com SweetAlert (usado para o futuro update) */

function editarDados(id)
{
    fetch(`/financeiros/datatable/` + id, {
        headers: {
            "Content-Type": "application/json; charset=utf-8",
            "X-CSRF-Token": token
        },
        method: 'GET',
    })
    .then(response => response.json())    
    .then(data => {

        Swal.fire({
            title: 'EDITAR DADOS FINANCEIROS',
            html:
            `<input type="hidden" id="swal-input0" value="${data.dados.id}" class="swal2-input">` +
            `<input id="swal-input1" value="${data.dados.name}" class="swal2-input">` +
            `<input id="swal-input2" value="${data.dados.gasto_1}" class="swal2-input">` +
            `<input id="swal-input3" value="${data.dados.gasto_2}" class="swal2-input">` +
            `<input id="swal-input4" value="${data.dados.gasto_3}" class="swal2-input">` +
            `<input id="swal-input5" value="${data.dados.gasto_4}" class="swal2-input">` +
            `<input id="swal-input6" value="${data.dados.description}" placeholder="Digite uma descrição aqui..." class="swal2-input">`,
          
            focusConfirm: false,
            preConfirm: () => {
            return [
                id_edit = document.getElementById('swal-input0').value,
                name_edit = document.getElementById('swal-input1').value,
                gasto_1_edit = document.getElementById('swal-input2').value,
                gasto_2_edit = document.getElementById('swal-input3').value,
                gasto_3_edit = document.getElementById('swal-input4').value,
                gasto_4_edit = document.getElementById('swal-input5').value,
                description_edit = document.getElementById('swal-input6').value,
            ]
            },
        })

        /* A seguir, o then é correspondente ao botão confirm.
        No caso, ele envia os dados para a função update. */

        .then((result) => {
            atualizarDados(id_edit, name_edit, gasto_1_edit, gasto_2_edit, gasto_3_edit, gasto_4_edit, description_edit)
        })
    })
    .catch(error => console.log(error)) // Mensagem caso retorne erro
    dataTable() // Atualizando tabela
}


function atualizarDados(id, name, gasto_1, gasto_2, gasto_3, gasto_4, description)
{
    fetch(`/financeiros/atualizarDados/` + id, {
        method: 'PUT',
        body: JSON.stringify({
            name: name,
            gasto_1: gasto_1,
            gasto_2: gasto_2,
            gasto_3: gasto_3,
            gasto_4: gasto_4,
            description: description

        }),
        headers: {

            'Accept': 'application/json',
            'Content-Type': 'application/json; charset=UTF-8',
            "X-CSRF-Token": token
        },
    })
    .then(response => response.json())
    .then(data => {
        Swal.fire(
            data.title,
            data.resposta,
            data.tema
        )
    })
    .catch(error => console.log(error)), // Mensagem caso retorne erro
    dataTable() // Atualizando a tabela para incluir o dado atualizado
}