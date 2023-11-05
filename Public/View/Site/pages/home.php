<style>
#atendimentos .caixas {
    width: 125px;
    height: 125px;
    text-align: center;
    padding: 10px;
    margin: 0 6px;
    border-radius: 10px;
    border: 1px solid rgba(0, 74, 173, 0.25);
    background: #FFF;
}

#atendimentos {
    height: 45vh !important;
}
</style>
<div id="apresentacao">
            <p>Acesso aos serviços de unidades básica de saúde.</p>
            <img src="<?=ROTA_GERAL?>/Public/Styles/assets/medica.png" alt="">
        </div>
        <div id="atendimentos">
            <div class="caixas" onclick="redirect('<?=ROTA_GERAL?>/Site/vacinas')">
                <p>VACINAS</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/seringa.svg" alt="">
            </div>
            <div class="caixas" onclick="redirect('<?=ROTA_GERAL?>/Site/consultas')">
                <p>CONSULTA CLÍNICA</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/clinica.svg" alt="">
            </div>
            <div class="caixas" onclick="redirect('<?=ROTA_GERAL?>/Site/dentista')">
                <p>DENTISTA</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/dente.svg" alt="">
            </div>
            <div class="caixas" onclick="redirect('<?=ROTA_GERAL?>/Site/gestante')">
                <p>GESTANTE</p>
                <img class="img" src="<?=ROTA_GERAL?>/Public/Styles/assets/gestante.svg" alt="">
            </div>
        </div>
