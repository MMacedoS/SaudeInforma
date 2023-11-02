<style>
    .image-preview {
      display: none;
      max-width: 300px;
      max-height: 300px;
    }
    img#preview {
    width: 300px;
}
</style>

<div class="row">
    <div class="col-sm-10">
        <h2>Dentista</h2>
    </div> 
    <div class="col-sm-2 text-end">
        <button class="btn btn-primary" id="btnAdd">ADD</button>
    </div>   
</div>
<hr>
<div class="row mt-4">
  <div class="table-responsive ml-3">
     <div id="table"></div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="vacinaModal" tabindex="-1" aria-labelledby="vacinaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Registro de Dentista</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form id="formularioVacina">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="nameInput" class="form-label">Tipo de tratamento</label>
            <input type="text" class="form-control" name="identificacao" id="identificacao" required>
          </div>
          <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" required>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="data_inicio" class="form-label">Data Inicio</label>
                    <input type="date" name="data_inicial" id="data_inicial" class="form-control" required>
                </div>          
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="data_final" class="form-label">Data Final</label>
                    <input type="date" name="data_final" id="data_final" class="form-control" required>
                </div>  
            </div>
          </div>          
          <div class="col-lg-12">
              <div class="mb-3">
                  <label for="local" class="form-label">Localização</label>
                    <textarea  name="local" id="local" class="form-control" cols="30" rows="2"></textarea>
              </div>  
          </div>
          <div class="mb-3">
            <label for="imageInput" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem" id="imagem">
          </div>
          <input type="hidden" name="imagem_anterior" id="imagem_anterior">
        </form>
        <hr>
        <div class="image-preview" id="imagePreview">
            <img src="" alt="Imagem Enviada" id="preview">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btnSalvar">Salvar</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready( function () {
            showData("<?=ROTA_GERAL?>/Dentista/getAllDentista")
            .then((response) => createTable(response)).then(() => hideLoader()
            );

            $('#imagem').change(function() {
            const file = this.files[0];
            if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
                $('#imagePreview').show();
            };
            reader.readAsDataURL(file);
            } else {
            $('#imagePreview').hide();
            }
        });
    });

    $('#btnAdd').click(function() {
        $('#vacinaModal').modal('show');
    });

    $('#btnSalvar').click(function(event) {
        event.preventDefault();
        $('.Salvar').prop('disabled', true);
        var id = $('#id').val();
        if(id == '') {
         return createData('<?=ROTA_GERAL?>/Dentista/addDentista', new FormData(document.getElementById("formularioVacina")));
        }    
        return updateData('<?=ROTA_GERAL?>/Dentista/updDentista/' + id, new FormData(document.getElementById("formularioVacina")), id);
    });

    function createTable(data) {        
        // Remove a tabela existente, se houver
        if (data.length === 0) {
            return;
        }
        var tableContainer = document.getElementById('table');
        var existingTable = tableContainer.querySelector('table');
        if (existingTable) {
            existingTable.remove();
        }
        var thArray = ['Cod', 'Identificação', 'Data Inicial', 'Data Final', 'Descricao', 'Local']; 
        var table = document.createElement('table');
        table.className = 'table table-sm mr-4 mt-3';
        var thead = document.createElement('thead');
        var headerRow = document.createElement('tr');

        thArray.forEach(function(value) {
            var th = document.createElement('th');
            th.textContent = value;
            
            if (value === 'Descricao' || value === 'Local' || value === 'Cod') {
                th.classList.add('d-none', 'd-sm-table-cell');
            }
            headerRow.appendChild(th);
        });

        thead.appendChild(headerRow);
        table.appendChild(thead);

        var tbody = document.createElement('tbody');

            data.forEach(function(item) {
                var tr = document.createElement('tr');              

                thArray.forEach(function(value, key) {
                        var td = document.createElement('td');
                        td.textContent = item[key];

                        if (value === 'Data Inicial') {
                            td.textContent = formatDate(item.data_inicial);
                        }

                        if (value === 'Data Final') {
                            td.textContent = formatDate(item.data_final);
                        }

                        if (value === 'Descricao') {
                            td.textContent = item.descricao;
                        }

                        if (value === 'Local') {
                            td.textContent = item.local;
                        }

                        if (value === 'Identificação') {
                            td.textContent = item.identificacao;
                        }

                        if (value === 'Cod') {
                            td.textContent = item.id;
                        }

                        if (value === 'Descricao' || value === 'Local' || value === 'Cod') {
                            td.classList.add('d-none', 'd-sm-table-cell');
                        }
                        tr.appendChild(td);
                    });
                                    // Adiciona os botões em cada linha da tabela
                var buttonsTd = document.createElement('td');

                var editButton = document.createElement('button');
                editButton.innerHTML = '<i class="fa fa-edit"></i>';
                editButton.className = 'btn btn-edit';

                var delButton = document.createElement('button');
                delButton.innerHTML = '<i class="fa fa-trash"></i>';
                delButton.className = 'btn btn-edit';
                // if(item.pagamento_id !== null) {
                //     editButton.hidden = true;
                    delButton.hidden = true;
                // } 
                buttonsTd.appendChild(editButton);
                buttonsTd.appendChild(delButton);

                // var clearButton = document.createElement('button');
                // clearButton.innerHTML = '<i class="fa fa-trash"></i>';
                // buttonsTd.appendChild(clearButton);

                var activateButton = document.createElement('button');
                activateButton.innerHTML = '<i class="fa fa-check"></i>';
                activateButton.className = 'btn btn-activate';
                buttonsTd.appendChild(activateButton);

                // Verificar o valor e definir o ícone e classe apropriados
                if (item.status === '0') {           
                    activateButton.querySelector('i').className = 'fa fa-times-circle text-danger';
                    activateButton.title = 'devolvido';
                } 
                if (item.status === '1') {
                    activateButton.querySelector('i').className = 'fa fa-check-circle text-success';
                    activateButton.title = 'Recebido';
                }

                // Adicionando a ação para o botão "Editar"
                editButton.addEventListener('click', function() {
                var rowData = Array.from(tr.cells).map(function(cell) {
                    return cell.textContent;
                });
                // Chamando a função desejada passando os dados da linha
                editarRegistro(rowData);
                });

                delButton.addEventListener('click', function() {
                var rowData = Array.from(tr.cells).map(function(cell) {
                    return cell.textContent;
                });
                // Chamando a função desejada passando os dados da linha
                deletarRegistro(rowData);
                });

                // Adicionando a ação para o botão "Editar"
                activateButton.addEventListener('click', function() {
                var rowData = Array.from(tr.cells).map(function(cell) {
                    return cell.textContent;
                });
                // Chamando a função desejada passando os dados da linha
                    deletarRegistro(rowData);

                });

                tr.appendChild(buttonsTd);
                tbody.appendChild(tr);                
            });

            table.appendChild(tbody);

            var destinationElement = document.getElementById('table');
            destinationElement.appendChild(table);

        return table;
    }


    function editarRegistro(rowData)
    {
        showData("<?=ROTA_GERAL?>/Dentista/findById/" + rowData[0])
            .then((response) => prepareModalEditar(response));
    }

    function deletarRegistro(rowData)
    {
        Swal.fire({
            title: 'Deseja remover esta card?',
            showDenyButton: true,
            confirmButtonText: 'Sim',
            denyButtonText: `Não`,
        }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {                
                deleteData("<?=ROTA_GERAL?>/Site/desativarCardAPTById/" + rowData[0]);
            } 
            if (result.isDenied) {
                Swal.fire('nenhuma mudança efetuada', '', 'info')
            }
        })
    }
   
    function prepareModalEditar(data) {
        $('#descricao').val(data[0].descricao);           
        $('#data_inicial').val(data[0].data_inicial);
        $('#data_final').val(data[0].data_final);
        $('#identificacao').val(data[0].identificacao);
        $('#local').val(data[0].local);
        $('#id').val(data[0].id);
        $('#imagem_anterior').val(data[0].imagem);
        $('#preview').attr('src', "<?=ROTA_GERAL?>/Public/Dentista/" + data[0].imagem);
            $('#imagePreview').show();
        $('#vacinaModal').modal('show');   
    }
</script>