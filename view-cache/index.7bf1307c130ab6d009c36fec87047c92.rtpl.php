<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Autocomplete Script -->
<script>
    $( function() {
      var availableTags = [<?php $counter1=-1;  if( isset($q) && ( is_array($q) || $q instanceof Traversable ) && sizeof($q) ) foreach( $q as $key1 => $value1 ){ $counter1++; ?><?php if( $value1["numero"]!='' ){ ?>"<?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php }else{ ?>"<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>,<?php } ?>];
      $( "#tags" ).autocomplete({
        source: availableTags
      });
    } );
    </script>

<div class="container-fluid">

    <div class="row">
        <div class="col-4 my-2">
           
            <nav class="navbar border border-secondary shadow rounded-top p-0 navbar-light style=" style="background-color: #adc8e6cb">
                <span class="navbar-text mb-0 my-0">
                    &nbsp;&nbsp;<i class="far fa-star"></i> <i>Meus</i> <b>Links Favoritos</b>
                </span>
            </nav>
                    
            <div class="container border border-secondary border-top-0 rounded-bottom" style="height: 380px;">

                <div class="row">
                    <div class="col mt-2 align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url01"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc01"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone01"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav01"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col mt-2 align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url02"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc02"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone02"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav02"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col mt-2 align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url03"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc03"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone03"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav03"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col mt-2 align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url04"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc04"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone04"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav04"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                </div>

                <div class="row">
                    
                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url05"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc05"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone05"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav05"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url06"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc06"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone06"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav06"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url07"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc07"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone07"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav07"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url08"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc08"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone08"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav08"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                </div>

                <div class="row">
                    
                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url09"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc09"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone09"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav09"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url10"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc10"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone10"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav10"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url11"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc11"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone11"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav11"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                    <div class="col align-middle" align="center">
                        <a href="<?php echo htmlspecialchars( $fav["url12"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $fav["desc12"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><h1 class="text-secondary"><i class="<?php echo htmlspecialchars( $fav["icone12"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></h1></a>
                        <p style="font-size: 12px;"><?php echo htmlspecialchars( $fav["fav12"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                    </div>

                </div>

                <p class='text-center' style="font-size: 12px; color: #748396">Escolha os seus links favoritos editando seus dados. <i class="fas fa-arrow-down"></i></p>
                
            </div> 


        </div>
        
        <div class="col-8">
            
            <!-- Cards informativos -->
            <div class="row">
                
                <div class="col bg-danger rounded text-light text-center my-2 mr-2">
                    <div class="row">
                        <div class="col-8">
                            <H1 class="display-5 mb-1"><b><?php echo htmlspecialchars( $represados, ENT_COMPAT, 'UTF-8', FALSE ); ?></b> </H1>
                        </div>
                        <div class="col-4 mx-0 mt-2">
                                <h3><a title="<?php echo htmlspecialchars( $dtRepresadosAnt, ENT_COMPAT, 'UTF-8', FALSE ); ?>: <?php echo htmlspecialchars( $represadosAnt, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $iconeRepresados, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a></h3>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><b>REPRESADOS</b></p>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars( $dtRepresados, ENT_COMPAT, 'UTF-8', FALSE ); ?> </p>
                        </div>  
                    </div>
                </div>
                
                <div class="col bg-success rounded text-light text-center my-2 mr-2">
                    <div class="row">
                        <div class="col-8">
                            <H1 class="display-5 mb-1"><b><?php echo htmlspecialchars( $tarefasConcluidas, ENT_COMPAT, 'UTF-8', FALSE ); ?></b> </H1>
                        </div>
                        <div class="col-4 mx-0 mt-2">
                                <h3><a title="Resultado anterior <?php echo htmlspecialchars( $tarefasConcluidasAnt, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $iconeTarefasConcluidas, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a></h3>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><b>TAREFAS CONCLUÍDAS</b></p>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars( $mesImaGdass, ENT_COMPAT, 'UTF-8', FALSE ); ?> </p>
                        </div>  
                    </div>
                </div>

                <div class="col bg-primary rounded text-light text-center my-2 mr-2">
                    <div class="row">
                        <div class="col-8">
                            <H1 class="display-5 mb-1"><b><?php echo htmlspecialchars( $tarefasPendentes, ENT_COMPAT, 'UTF-8', FALSE ); ?></b> </H1>
                        </div>
                        <div class="col-4 mx-0 mt-2">
                                <h3><a title="Resultado anterior <?php echo htmlspecialchars( $tarefasPendentesAnt, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $iconeTarefasPendentes, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a></h3>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><b>TAREFAS PENDENTES</b></p>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars( $mesImaGdass, ENT_COMPAT, 'UTF-8', FALSE ); ?> </p>
                        </div>  
                    </div>
                </div>
                
                <div class="col rounded text-light text-center my-2 mr-2" style="background: orange">
                    <div class="row">
                        <div class="col-8">
                            <H1 class="display-5 mb-1"><b><?php echo htmlspecialchars( $imaGdass, ENT_COMPAT, 'UTF-8', FALSE ); ?></b></H1>
                        </div>
                        <div class="col-4 mx-0 mt-2">
                                <h3><a title="<?php echo htmlspecialchars( $mesImaGdassAnt, ENT_COMPAT, 'UTF-8', FALSE ); ?>: <?php echo htmlspecialchars( $imaGdassAnt, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $iconeImaGdass, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a></h3>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><b>IMA-GDASS</b></p>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars( $mesImaGdass, ENT_COMPAT, 'UTF-8', FALSE ); ?> </p>
                        </div>  
                    </div>
                </div>

                <div class="col rounded text-light text-center my-2 mr-2" style="background: rgb(88, 88, 88">
                    <div class="row">
                        <div class="col-8">
                            <H1 class="display-5 mb-1"><b><?php echo htmlspecialchars( $iib, ENT_COMPAT, 'UTF-8', FALSE ); ?></b> </H1>
                        </div>
                        <div class="col-4 mx-0 mt-2">
                                <h3><a title="Resultado anterior <?php echo htmlspecialchars( $iibAnt, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="<?php echo htmlspecialchars( $iconeiib, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a></h3>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><b>INDEFERIMENTO</b></p>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-1">
                            <p class="my-1" style="font-size: 12px;"><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars( $mesImaGdass, ENT_COMPAT, 'UTF-8', FALSE ); ?> </p>
                        </div>  
                    </div>
                </div>
                
            </div>
        
            <!-- Gráfico e Calendário -->    
            <div class="row mt-1">
                <div class="col-7 p-0">
                  
                    <div id="carouselGraph" class="carousel slide align-itens-left" data-ride="carousel">
                        
                        <div class="carousel-inner">
                            
                            <div class="carousel-item active">                                
                                <!-- BAR CHART REPRESADOS -->
                                <div class="col">
                                    <div class="card bar-chart-represados border-secondary">
                                      <div class="card-header d-flex align-items-center border-secondary">
                                        <h4>Represamento</h4><small class="text-muted">&nbsp;&nbsp;Última atualização em 10/12/2018</small>
                                      </div>
                                      <div class="card-body ">
                                        <canvas id="barChartExample" height="175"></canvas>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            
                            <div class="carousel-item">
                                <div class="col">
                                    <div class="card border-secondary my-0">
                                        
                                        <div class="card-body">                                
                                            <!-- BAR CHART IMA-GDASS -->                                            
                                            <canvas id="myChart" height="166"></canvas>
                                            <script>
                                            var ctx = document.getElementById("myChart");
                                            var chartGraph = new Chart (ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: [<?php $counter1=-1;  if( isset($ima) && ( is_array($ima) || $ima instanceof Traversable ) && sizeof($ima) ) foreach( $ima as $key1 => $value1 ){ $counter1++; ?>"<?php echo htmlspecialchars( $value1["mes"], ENT_COMPAT, 'UTF-8', FALSE ); ?>",<?php } ?>],
                                                    datasets:[{
                                                        label: "IMA-GDASS",
                                                        data: [<?php $counter1=-1;  if( isset($ima) && ( is_array($ima) || $ima instanceof Traversable ) && sizeof($ima) ) foreach( $ima as $key1 => $value1 ){ $counter1++; ?><?php echo htmlspecialchars( $value1["indicador"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?>],           
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
                                                }
                                                
                                            });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="carousel-item">                                
                                <!-- BAR CHART TAREFAS -->
                                <div class="col">
                                    <div class="card bar-chart-tarefas border-secondary">
                                      <div class="card-header d-flex align-items-center border-secondary">
                                        <h4>TAREFAS</h4><small class="text-muted">&nbsp;&nbsp;Última atualização em 10/12/2018</small>
                                      </div>
                                      <div class="card-body">
                                        <canvas id="barChartTarefas" height="150"></canvas>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <a class="carousel-control-prev text-secondary" href="#carouselGraph" role="button" data-slide="prev" style="background: none;">
                            <span class="carousel-control-prev-icon"><h1><i class="fas fa-angle-left"></i></h1></span>
                            <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next text-secondary" href="#carouselGraph" role="button" data-slide="next" style="background: none;">
                            <span class="carousel-control-next-icon"><h1><i class="fas fa-angle-right"></i></h1></span>
                            <span class="sr-only">Próximo</span>
                            </a>

                        </div>
                    </div>

                </div>
                <div class="col">
                   <div class="border rounded border-secondary mx-3 my-2"style="height: 280px;"></div>
                </div>
            </div>
            
        </div>
    </div>

</div>