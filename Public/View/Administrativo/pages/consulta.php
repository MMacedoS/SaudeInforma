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
        <h2>Consultas Clinicas</h2>
    </div> 
    <div class="col-sm-2 text-end">
        <button class="btn btn-primary" id="btnAdd">ADD</button>
    </div>   
</div>
<hr>
<div class="row mt-4">
    <table class="table bordered">
        <thead>
            <th>Consulta</th>            
            <th>Descricão</th>
            <th>Horario inicial</th>
            <th>Horario Final</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <tr>
                <td>Gripe</td>
                <td>Campanha contra a gripe</td>
                <td>17/06/2023</td>
                <td>17/07/2023</td>                
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="vacinaModal" tabindex="-1" aria-labelledby="vacinaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Registro de Consulta Clinica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form id="formularioVacina">
          <div class="mb-3">
            <label for="nameInput" class="form-label">Tipo de consulta</label>
            <input type="text" class="form-control" name="nome" id="nameInput" required>
          </div>
          <div class="mb-3">
            <label for="nameInput" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="nameInput" required>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="phoneInput" class="form-label">Horario Inicio</label>
                    <input type="number" name="data_inicio" id="" class="form-control" required>
                </div>          
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="phoneInput" class="form-label">Horario Final</label>
                    <input type="number" name="data_final" id="" class="form-control" required>
                </div>  
            </div>
          </div>
          <div class="mb-3">
            <label for="imageInput" class="form-label">Imagem</label>
            <input type="file" class="form-control" name="imagem" id="imagem">
          </div>
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
            // showData("<=ROTA_GERAL?>/Site/findAllCardApt")
            // .then((response) => createTable(response)).then(() => hideLoader());
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
         return createData('<?=ROTA_GERAL?>/Vacina/addVacina', new FormData(document.getElementById("formularioVacina")));
        }    
        return updateData('<?=ROTA_GERAL?>/Vacina/updVacina/' + id, new FormData(document.getElementById("formularioVacina")), id);
    });
</script>