</div>
<footer>
    <div class="container">
      <!-- <p>&copy; 2023 Nome da Empresa. Todos os direitos reservados.</p> -->
    </div>
</footer> 
 
 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
 <!-- Chart.js -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
<!-- Core theme JS-->
<script src="<?=ROTA_GERAL?>/Public/Styles/js/scripts.js"></script>
<script>
    $(document).ready(function() {
      $(".dropdown-toggle").click(function() {
        $(this).siblings(".dropdown-menu").toggleClass("show");
      });

      $(document).click(function(e) {
        if (!$(e.target).closest(".dropdown").length) {
          $(".dropdown-menu").removeClass("show");
        }
      });
    });
</script>

<script>
    // Pie Chart
    var pieChartCanvas = document.getElementById('pieChart').getContext('2d');
    var pieChartData = {
      labels: ['Consultas', 'Vacinas 2', 'Campanha'],
      datasets: [{
        data: [30, 50, 20],
        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
      }]
    };
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieChartData
    });

    // Line Chart
    var lineChartCanvas = document.getElementById('lineChart').getContext('2d');
    var lineChartData = {
      labels: ['Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
      datasets: [{
        label: 'Dataset 1',
        data: [12, 19, 3, 5, 2, 3],
        borderColor: '#FF6384',
        fill: false
      }, {
        label: 'Dataset 2',
        data: [7, 11, 5, 8, 3, 7],
        borderColor: '#36A2EB',
        fill: false
      }]
    };
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData
    });
  </script>


<script src="<?=ROTA_GERAL?>/Public/Styles/js/send.js"></script>
<script>
  // Função para criar um novo registro
  function createData(url, data) {
    showLoader();
    $.ajax({
      url: url,
      method: 'POST',
      data: data,
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response) {
        showSuccessMessage('Registro criado com sucesso!');
        hideLoader();
      },
      error: function(error) {
        console.error('Erro ao criar registro:', error);
        hideLoader();
        showErrorMessage("Não foi possivel criar o registro");
      }
    });
  }

   // Função para atualizar um registro existente
   function updateData(url, data) {
    showLoader();
    $.ajax({
      url: url,
      method: 'POST',
      data: data,
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData:false,
      success: function(response) {
        showSuccessMessage('Registro atualizado com sucesso!');
        hideLoader();
      },
      error: function(error) {
        console.error('Erro ao atualizar registro:', error);
        hideLoader();
      }
    });
  }

  // Função para exibir um registro
  function showData(url) {
    showLoader();
    return $.ajax({
      url: url,
      method:'GET',
      processData: false,
      dataType: 'json',
    }).catch(function(error){
      console.error('Erro ao obter registro:', error);
      hideLoader();
    });
  }

  // Função para exibir um registro
  function showDataWithData(url, data) {
    showLoader();
    return $.ajax({
      url: url,
      method: 'POST',
      data: data,
      dataType: 'JSON',
      processData: false,
      contentType: false,
      cache: false,
      }).catch(function(error){
        console.error('Erro ao obter registro:', error);
        hideLoader();
      });
  }

  function redirecionarPagina(url) {
    window.location.assign(url);
  }

  // Função para excluir um registro
  function deleteData(url) {
    showLoader();
    $.ajax({
      url: url,
      method: 'DELETE',
      processData: false,
      dataType: 'json',
      success: function(response) {
        showSuccessMessage('Registro excluído com sucesso!');
        hideLoader();
      },
      error: function(error) {
        console.error('Erro ao excluir registro:', error);
        hideLoader();
      }
    });
  }

  function showLoader() {
    $('<div class="spinner"></div>').appendTo('body');
  }

  function hideLoader() {
    $('.spinner').remove();
  }

  function showSuccessMessage(message) {
    Swal.fire({
      icon: 'success',
      title: 'Sucesso!',
      text: message,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    }).then(()=>{
        refreshPage();
    });
  }
  
  function showWarningMessage(message) {
    Swal.fire({
      icon: 'warning',
      title: 'Atenção!',
      text: message,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    }).then(()=>{
        refreshPage();
    });
  }
  
  function showErrorMessage(message) {
    Swal.fire({
      icon: 'error',
      title: 'Erro!',
      text: message,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Ok'
    }).then(()=>{
        refreshPage();
    });
  }
  
  function refreshPage() {
    location.reload(true);
  }  
  
  function formatDate(value)
  {
      const date = value.split('-');
      return ''+date[2]+ '/' + date[1] + '/' + date[0];
  }

  function formatDateWithHour(value)
  {
      const date = value.split(' ');
      return formatDate(date[0]) + ' ' + date[1];
  }

</script>

</body>
</html>