<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="col-6 card border-secondary my-0">
        <div class="card-header d-flex align-items-center border-secondary">
        <h4>IMA GDASS</h4><small class="text-muted">&nbsp;&nbsp;Última atualização em 10/12/2018</small>
        </div>
        <div class="card-body">                                
            <!-- BAR CHART IMA-GDASS -->                                            
            <canvas id="myChart" height="138"></canvas>
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