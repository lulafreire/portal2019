<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
    <?php $counter1=-1;  if( isset($ind) && ( is_array($ind) || $ind instanceof Traversable ) && sizeof($ind) ) foreach( $ind as $key1 => $value1 ){ $counter1++; ?>
    <div class="row my-2 mx-2">
        
        <?php if( $value1["indicador"]=='represados' ){ ?>
        <div class="col-8 mx-2">
         
            <canvas id="myChartRep" height="150"></canvas>
            <script>
            var ctx = document.getElementById("myChartRep");
            var chartGraph = new Chart (ctx, {
                type: 'bar',
                data: {
                    labels: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?>"<?php echo converteData($value2["data"]); ?>",<?php } ?>],
                    datasets:[{
                        label: "<?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> TOTAL",
                        data: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?><?php echo htmlspecialchars( $value2["indicador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?>],           
                        backgroundColor: [
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)',
                            'rgba(212, 0, 0, 0.6)'
                        ],
                        borderColor: [
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)',
                            'rgba(143, 0, 0, 1)'
                        ],
                        borderWidth: 1,
                        },
                        {
                        label: "ADM",
                        data: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?><?php echo htmlspecialchars( $value2["adm"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?>],           
                        backgroundColor: [
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)'
                        ],
                        borderColor: [
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)'
                        ],
                        borderWidth: 1,
                        },
                        {
                        label: "PM/AS",
                        data: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?><?php echo htmlspecialchars( $value2["pm_as"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?>],           
                        backgroundColor: [
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)'
                        ],
                        borderColor: [
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)'
                        ],
                        borderWidth: 1,
                        }                                                    
                    ]
                },
                "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}
                
            });
            </script>

        </div>
        <div class="col">
            <div class="row">
                <div class="col-12 text-center">
                        <a href="represados" class="btn btn-danger btn-sm">Represados</a>&nbsp;&nbsp;<a href="tarefas" class="btn btn-success btn-sm">Tarefas</a>&nbsp;&nbsp;<a href="imaGdass" class="btn btn-warning btn-sm text-light">IMA-GDASS</a>&nbsp;&nbsp;<a href="iib" class="btn btn-secondary btn-sm">Indeferimento</a>
                </div>               
            </div>
            <?php if( $user["status"]==1 OR $user["status"]==3 ){ ?>
            <div class="row">
                <div class="col-12 my-3">
                    <div class="card border-secondary mb-3" style="height: 360px;">
                    <div class="card-header bg-secondary border-secondary text-light">Atualizar dados do indicador <strong><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></div>
                    <div class="card-body">
                        <form method="POST" action="represados">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="data">Data da carga do SUIBE</label>
                                        <input type="data" class="form-control" id="data" name="data" maxlength='10' onkeypress="formatar_mascara(this, '##/##/####')" placeholder="Data" required>
                                        <p class="text-muted"><small>Para alterar os dados existentes, informe a data.</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-0">
                                    <div class="form-group mb-0">
                                        <label for="adm">ADM</label>
                                        <input type="text" name="adm" class="form-control" id="adm" placeholder="Qtde." required>
                                    </div>
                                </div>
                                <div class="col-6 mb-0">
                                    <div class="form-group mb-0">
                                        <label for="pm_as">PM/AS</label>
                                        <input type="text" name="pm_as" class="form-control" id="pm_as" placeholder="Qtde." required>
                                    </div> 
                                </div>
                            </div>
                            <div class="row my-0">
                                <div class="col-12">
                                        <span class="text-muted my-0"><small>Para excluir o registro, informe zero nas quantidades.</small></span>
                                </div>                               
                            </div>                        
                        </div>
                    <div class="card-footer bg-muted border-secondary text-muted text-light">
                        <input type="hidden" name="indicador" value="<?php echo htmlspecialchars( $value1["indicador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="row">
                <div class="col-12 my-3">
                    <div class="card border-secondary mb-3" style="height: 360px;">
                    <div class="card-header bg-secondary border-secondary text-light"><strong><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></div>
                    <div class="card-body">
                        <p class="card-text">Quantidade de processos aguardando conclusão, sob responsabilidade da unidade.</p>
                        <p class="card-text"><strong>ADM:</strong> processos aguardando ação da APS sob responsabilidade dos servidores administrativos.</p>
                        <p class="card-text"><strong>PM/AS:</strong> processos aguardando agendamento ou conclusão de perícia médica ou avaliação social.</small></p>
                        <p class="card-text"><strong>Avaliação:</strong> quanto menor, melhor.</small></p>
                    </div>
                    <div class="card-footer bg-muted border-secondary text-muted text-light">
                        <p class="card-text text-muted"><strong>Fonte: </strong> SUIBE</p>
                    </div>                         
                </div>
            </div>
            <?php } ?>
        </div>

        <?php }elseif( $value1["indicador"]=='tarefas' ){ ?>
        <div class="col-8 mx-2">
        
            <canvas id="myChartTar" height="150"></canvas>
            <script>
            var ctx = document.getElementById("myChartTar");
            var chartGraph = new Chart (ctx, {
                type: 'bar',
                data: {
                    labels: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?>"<?php echo converteComp($value2["competencia"]); ?>",<?php } ?>],
                    datasets:[
                        {
                        label: "<?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> CONCLUÍDAS",
                        data: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?><?php echo htmlspecialchars( $value2["concluidas"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?>],           
                        backgroundColor: [
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)',
                            'rgba(51, 179, 90, 0.6)'
                        ],
                        borderColor: [
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)',
                            'rgba(51, 179, 90, 1)'
                        ],
                        borderWidth: 1,
                        },
                        {
                        label: "<?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?> PENDENTES",
                        data: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?><?php echo htmlspecialchars( $value2["pendentes"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?>],           
                        backgroundColor: [
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)',
                            'rgba(0, 120, 255, 0.6)'
                        ],
                        borderColor: [
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)',
                            'rgba(0, 58, 166, 1)'
                        ],
                        borderWidth: 1,
                        }                                                    
                    ]
                },
                "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}
                
            });
            </script>            

        </div>
        <div class="col mx-2">
           <div class="row">
               <div class="col-12 text-center">
                    <a href="represados" class="btn btn-danger btn-sm">Represados</a>&nbsp;&nbsp;<a href="tarefas" class="btn btn-success btn-sm">Tarefas</a>&nbsp;&nbsp;<a href="imaGdass" class="btn btn-warning btn-sm text-light">IMA-GDASS</a>&nbsp;&nbsp;<a href="iib" class="btn btn-secondary btn-sm">Indeferimento</a>
               </div>               
           </div>
           <?php if( $user["status"]==1 OR $user["status"]==3 ){ ?>
           <div class="row">
                <div class="col-12 my-3">
                    <div class="card border-secondary mb-3" style="height: 360px;">
                    <div class="card-header bg-secondary border-secondary text-light">Atualizar dados do indicador <strong><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></div>
                    <div class="card-body">
                        <form method="POST" action="represados">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="data">Competência</label>
                                        <input type="text" class="form-control" id="competencia" name="competencia" maxlength='7' onkeypress="formatar_mascara(this, '##/####')" placeholder="Competência" required>
                                        <p class="text-muted"><small>Para alterar os dados existentes, informe a data.</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-0">
                                    <div class="form-group mb-0">
                                        <label for="adm">Concluídas</label>
                                        <input type="text" name="concluidas" class="form-control" id="concluidas" placeholder="Qtde." required>
                                    </div>
                                </div>
                                <div class="col-6 mb-0">
                                    <div class="form-group mb-0">
                                        <label for="pm_as">Pendentes</label>
                                        <input type="text" name="pendentes" class="form-control" id="pendentes" placeholder="Qtde." required>
                                    </div> 
                                </div>
                            </div>
                            <div class="row my-0">
                                <div class="col-12">
                                        <span class="text-muted my-0"><small>Para excluir o registro, informe zero nas quantidades.</small></span>
                                </div>                               
                            </div>                        
                        </div>
                        <div class="card-footer bg-muted border-secondary text-muted text-light">
                            <input type="hidden" name="indicador" value="<?php echo htmlspecialchars( $value1["indicador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="row">
                <div class="col-12 my-3">
                    <div class="card border-secondary mb-3" style="height: 360px;">
                    <div class="card-header bg-secondary border-secondary text-light"><strong><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></div>
                    <div class="card-body">
                        <p class="card-text">Quantidade de tarefas concluídas e pendentes por mês, sob responsabilidade dos servidores da Unidade.</p>
                        <p class="card-text"><strong>Avaliação:</strong> para CONCLUÍDAS, quanto menor, melhor; para PENDENTES, quanto menor, melhor.</small></p>
                    </div>
                    <div class="card-footer bg-muted border-secondary text-muted text-light">
                        <p class="card-text text-muted"><strong>Fonte: </strong> GET - Gerenciador de Tarefas</p>
                    </div>                        
                </div>
            </div>
            <?php } ?>
        </div>        
        <?php }else{ ?>
        <div class="col-8 mx-2">
        
            <canvas id="myChart" height="150"></canvas>
        <script>
        var ctx = document.getElementById("myChart");
        var chartGraph = new Chart (ctx, {
            type: 'bar',
            data: {
                labels: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?>"<?php echo converteComp($value2["competencia"]); ?>",<?php } ?>],
                datasets:[
                    {
                    label: "<?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>",
                    data: [<?php $counter2=-1;  if( isset($ind12) && ( is_array($ind12) || $ind12 instanceof Traversable ) && sizeof($ind12) ) foreach( $ind12 as $key2 => $value2 ){ $counter2++; ?><?php echo htmlspecialchars( $value2["indicador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?>],           
                    backgroundColor: [
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)',
                        'rgba(51, 179, 90, 0.6)'
                    ],
                    borderColor: [
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)',
                        'rgba(51, 179, 90, 1)'
                    ],
                    borderWidth: 1,
                    }
                ]
            },
            "options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}
            
        });
        </script>

        </div>
        <div class="col mx-2">
            <div class="row">
                <div class="col-12 text-center">
                        <a href="represados" class="btn btn-danger btn-sm">Represados</a>&nbsp;&nbsp;<a href="tarefas" class="btn btn-success btn-sm">Tarefas</a>&nbsp;&nbsp;<a href="imaGdass" class="btn btn-warning btn-sm text-light">IMA-GDASS</a>&nbsp;&nbsp;<a href="iib" class="btn btn-secondary btn-sm">Indeferimento</a>
                </div>               
            </div>
            <?php if( $user["status"]==1 OR $user["status"]==3 ){ ?>
            <div class="row">
                <div class="col-12 my-3">
                    <div class="card border-secondary mb-3" style="height: 360px;">
                    <div class="card-header bg-secondary border-secondary text-light">Atualizar dados do indicador <strong><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></div>
                    <div class="card-body">
                        <form method="POST" action="represados">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="competencia">Competência</label>
                                        <input type="text" class="form-control" id="competencia" name="competencia" maxlength='7' onkeypress="formatar_mascara(this, '##/####')" placeholder="Competência" required>
                                        <p class="text-muted"><small>Para alterar os dados existentes, informe a data.</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-0">
                                    <div class="form-group mb-0">
                                        <label for="indicador">Índice</label>
                                        <input type="text" name="indice" class="form-control" id="indice" placeholder="Índice" required>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row my-0">
                                <div class="col-12">
                                        <span class="text-muted my-0"><small>Para excluir o registro, informe zero na quantidade.</small></span>
                                </div>                               
                            </div>                        
                        </div>
                    <div class="card-footer bg-muted border-secondary text-muted text-light">
                        <input type="hidden" name="indicador" value="<?php echo htmlspecialchars( $value1["indicador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="row">
                <div class="col-12 my-3">
                    <div class="card border-secondary mb-3" style="height: 360px;">
                    <div class="card-header bg-secondary border-secondary text-light"><strong><?php echo htmlspecialchars( $value1["titulo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></div>
                    <div class="card-body">
                        <?php if( $value1["titulo"]=='IIB' ){ ?>
                        <p class="card-text">Percentual de requerimentos indeferidos, em relação ao total de benefícios despachados no mês.</p>
                        <p class="card-text"><strong>Avaliação:</strong> quanto menor, melhor. É tido como aceitável uma média em torno de 30%</small></p>
                        <?php }else{ ?>
                        <p class="card-text">Somatório dos dias de represamento dividido pela quantidade de processos aguardando análise, sob responsabilidade dos servidores administrativos. Indicador utilizado para definir a parte variável dos servidores do INSS.</p>
                        <p class="card-text"><strong>Avaliação:</strong> quanto menor, melhor.</small></p>
                        <?php } ?>
                    </div>
                    <div class="card-footer bg-muted border-secondary text-muted text-light">
                        <p class="card-text text-muted"><strong>Fonte: </strong> SUIBE</p>
                    </div>                         
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>