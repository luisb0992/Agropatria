@extends('layouts.app')
@section('content')
    <div class="">
        <h3 class="div-blue">Status - Bienes</h3>    
        <div id="container2" class="box box-solid box-primary"></div>
        <br>
        <h3 class="div-blue">Departamentos - Bienes</h3> 
		<div id="container3" class="box box-solid box-primary"></div>
    </div>
@endsection
@section('script')
	<script src="{{asset('plugins/highcharts/highcharts.js')}}"></script>
	<script src="{{asset('plugins/highcharts/exporting.js')}}"></script>
	<script>

	// grafico tipo torta
    Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: true,
            type: 'pie'
        },
        exporting:{ enabled:true},
        credits:{ enabled:false},
        title: {
            text: 'Cantidad de Bienes en Diferentes Status (%)'
        },
        subtitle: {
            text: 'Status previamente asignadoa bienes'
        },
        tooltip: {
            pointFormat: '{series.name}:<b>{point.y}</b>  <b>({point.percentage:.1f}%)</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total ',
            colorByPoint: true,
            data:[
                <?php $data = ''; ?>
                 <?php foreach ($bienes as $bien) {?>
                    <?php foreach ($bien as $status){ $data = $status->nameStatusBienes(); }?>
                        ['<?php echo $data;?>' , <?php echo $bien->count(); ?>],
                 <?php } ?>
                 ]
        }]
    });

    //grafico de column tipo barras
    Highcharts.chart('container3', {
        chart: {
            type: 'column'
        },
        exporting:{ enabled:true},
        credits:{ enabled:false},
        title: {
            text: 'Cantidad de Bienes en Distintos Departamentos'
        },
        subtitle: {
            text: 'Bienes en diferentes status'
        },
        xAxis: {
            categories:['DEPARTAMENTOs'],
            crosshair: false
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad (Nº)'
            }
        },
        tooltip: {
            shared: false,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.4,
                borderWidth: 0,
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true
                },
                showInLegend: true
            }
        },
        series: 
        [
        <?php $data = ''; ?>
        <?php foreach ($dep as $d) { ?>
            <?php foreach ($d as $dep_data) { $data = $dep_data->nameDepartamento(); }?>
            { name: <?php echo "'".$data."'" ?>, data: [ <?php echo $d->count();?> ] },
        <?php }?>
        ]
    });
	</script>
@endsection