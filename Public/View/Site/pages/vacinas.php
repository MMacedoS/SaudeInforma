<style>
#apresentacao {
    background: url(assets/img-bg.png) no-repeat center/cover;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0px 10px;
    height: 75px;
}

#apresentacao p {
    /* border: 1px solid green; */
    text-align: center;
    font-size: 24px;
    font-style: normal;
    font-weight: 400;
}

#apresentacao img {
    border: 1px solid red;
}

/* Atendimentos */
#atendimentos {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 10px 20px 0px 20px;

}
#atendimentos .card{
    width: 150px;
    height: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    background-color: transparent;
    border-radius: 5%;
    padding: 0px;
    margin: 0px;
}
.card p {
    color: #004AAD;
    margin: 10px 10px;
}
</style>
    <div id="apresentacao"  style="background-image: url(<?=ROTA_GERAL?>/Public/Styles/assets/img-bg.png)">
            <p>VACINAS</p>
    </div>
            <div id="atendimentos">
                <?php if(!is_null($data)) {
                    foreach($data as $item) {
                    ?>
                <div class="card">
                    <img src="<?=ROTA_GERAL?>/Public/Vacina/<?=$item['imagem']?>" alt="" width="150">
                    <p><?=$item['identificacao']?></p>
                </div>

                <?php } ///fechamento for
                
            } //fechamento if
                ?>
            </div>