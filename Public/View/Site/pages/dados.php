<style>
    #atendimentos {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 10px 20px 0px 20px;
}

    #atendimentos #detalhe{
    width: 400px;

    display: flex;
    flex-direction: column;
    align-items: center;
    /* justify-content: space-evenly; */
    border-radius: 5%;
    padding: 10px;
    margin: 10px;

}
#detalhe h1, li, strong {
    color: #004AAD;
    padding: 10px;
    list-style: none;
}

</style>
<div id="atendimentos">
    <div id="detalhe">
        <h1><?=$data['identificacao']?></h1>
        <img src="<?=ROTA_GERAL?>/Public/<?=$dir?>/<?=$data['imagem']?>" alt="Imagem" width="150">
        <ul>
            <li><strong>Período de Atendimento:</strong></li>
            <ul>
                <li>Inicio: <?=self::prepareDateBR($data['data_inicial'])?></li>
                <li>Termino: <?=self::prepareDateBR($data['data_final'])?></li>
            </ul>
            <li><strong>Descrição:</strong></li>
            <ul>
                <li><?=$data['descricao']?></li>
            </ul>
                <li><strong>Localização:</strong></li>
            <ul>
                <li>Endereço: <?=$data['local']?></li>
            </ul>
        </ul>
    </div>
</div>