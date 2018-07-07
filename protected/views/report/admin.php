<?php
/* @var $this CartController */
/* @var $model Cart */

$this->breadcrumbs=array(
	'reports'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Bills', 'url'=>array('index')),
	//array('label'=>'Create Cart', 'url'=>array('create')),
);

?>

<h1>Sales Reports</h1>

<!-- daily sale

today total sales

highest sales product
lowest sales product

daily weekly and monthly

-->

<?php  $this->renderPartial('_form', array('model'=>$model,'getallmonth'=>$getallmonth,'getallyear'=>$getallyear)); ?>
<?php 
//echo  $chartstatus;
// //echo $cat;
//print_r($chartweekdata); 
//print_r($cat);
$cat=implode("','", $cat);

// print_r(json_encode($chartweekdata));
if($chartstatus=="" && empty($cat) && $chartdata==""){
?>
<div class="clear"></div>
<div class="row text-center">
<h4>No Record Found</h4>
</div>
<?php
}else{
  if(isset($_GET['Cart'])){
  ?>
<div class="clear"></div>
<div class="row" style="margin-left:10px;">
<h4>
<?php 
 echo CHtml::link('Download Report',array('report/createpdf',
                                         'Cart[time]'=>isset($_GET['Cart']['time']) ? $_GET['Cart']['time'] : '',
                                         'Cart[status]'=>isset($_GET['Cart']['status']) ? $_GET['Cart']['status'] : '',
                                         'Cart[month]'=>isset($_GET['Cart']['month']) ? $_GET['Cart']['month'] : '',
                                         'Cart[year]'=>isset($_GET['Cart']['year']) ? $_GET['Cart']['year'] : '',
                                         ), array('target'=>'_blank')); ?>
                                         </h4></div>
<?php
}
}
?>

<?php

if($cat!="" && $chartdata!="" && $chartname=='day'){

$this->Widget('ext.highcharts.HighchartsWidget', [  
    'scripts' => array(
     'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
     'modules/exporting', // adds Exporting button/menu to chart
//     'themes/grid'        // applies global 'grid' theme to all charts
),
   'options'=>"{
      title: { 'text': 'Daily Chart - Total Sales :".$hinumber."' },
      xAxis: {
         categories: ['".$cat."']
      },
      yAxis: {
         title: { 'text': 'Sales in numbers' }
      },
      tooltip: {
    headerFormat: '<span style='font-size:10px;width:300px'>{point.key}</span><table>',
    pointFormat: '<tr><td style='color:{series.color};padding:0'> </td> <td style='padding:0'><b>{point.y:.1f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
   
  },
      series: [
         { 'name': '".$catstatus."', 'data': [".rtrim($chartdata,',')."] }
      ]
   }"

    ]);   
}
//print_r($cat);
if($cat!="" && $chartname=='week'){

$this->Widget("ext.highcharts.HighchartsWidget", [
  'scripts' => array(
     'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
     'modules/exporting', // adds Exporting button/menu to chart
//     'themes/grid'        // applies global 'grid' theme to all charts
),
  
   "options"=>"{
  chart: {
    type: 'column'
  },
  title: {
    text: 'Product Sales'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['".$cat."'],
    crosshair: true
  },
  yAxis: {
    
    title: {
      text: 'Sales in numbers '
    },
   
  },
    tooltip: {
        headerFormat: '<span style='font-size:11px'>{point.key}</span><br>',
        pointFormat: '<span style='color:{point.color}'>Total : </span><b>{point.y}</b><br/>'
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
   
  },
  series: [{
        name: '".$catstatus."',
        data: [".rtrim($chartdata,',')."]
      }]
}"
]); 
?>
<br/><br/>
<?php
$this->Widget('ext.highcharts.HighchartsWidget', [
    'scripts' => array(
     'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
     'modules/exporting', // adds Exporting button/menu to chart
//     'themes/grid'        // applies global 'grid' theme to all charts
),
   'options'=>"{

      title: { 'text': 'Weekly Sales' },
      xAxis: {
         categories: ['".implode("','", $salesweekdate)."']
      },
      yAxis: {
         title: { 'text': 'Sales in numbers ' }
      },
      tooltip: {
    headerFormat: '<span style='font-size:10px;width:300px'>{point.key}</span><table>',
    pointFormat: '<tr><td style='color:{series.color};padding:0'> </td> <td style='padding:0'><b>{point.y:.1f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
   plotOptions: {
    line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
   
  },
      series: [
         { 'name': '".$catstatus."', 'data': [".implode(",", $salesweekdata)."] }
      ]
   }"
]);

}
if($cat!="" && $chartname=='month'){

$this->Widget("ext.highcharts.HighchartsWidget", [
    'scripts' => array(
     'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
     'modules/exporting', // adds Exporting button/menu to chart
//     'themes/grid'        // applies global 'grid' theme to all charts
),
   "options"=>"{
  chart: {
    type: 'column'
  },
  title: {
    text: 'Product Sales'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['".$cat."'],
    crosshair: true
  },
  yAxis: {
   
    title: {
      text: 'Sales in numbers '
    }
  },
  tooltip: {
        headerFormat: '<span style='font-size:11px'>{point.key}</span><br>',
        pointFormat: '<span style='color:{point.color}'>Total : </span><b>{point.y}</b><br/>'
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
  series: [{
        name: '".$catstatus."',
        data: [".rtrim($chartdata,',')."]
      }]
}"
]); 
?>
<br/><br/>
<?php
$this->Widget('ext.highcharts.HighchartsWidget', [
    'scripts' => array(
     'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
     'modules/exporting', // adds Exporting button/menu to chart
//     'themes/grid'        // applies global 'grid' theme to all charts
),
   'options'=>"{
      title: { 'text': 'Monthly Sales' },
      xAxis: {
         categories: ['".implode("','", $salesweekdate)."']
      },
      yAxis: {
         title: { 'text': 'Sales in numbers' }
      },
      tooltip: {
    headerFormat: '<span style='font-size:10px;width:300px'>{point.key}</span><table>',
    pointFormat: '<tr><td style='color:{series.color};padding:0'> </td> <td style='padding:0'><b>{point.y:.1f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
   
  },
      series: [
         { 'name': '".$catstatus."', 'data': [".implode(",", $salesweekdata)."] }
      ]
   }"
]);

}
if($cat!="" && $chartname=='year'){

$this->Widget("ext.highcharts.HighchartsWidget", [
    'scripts' => array(
     'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
     'modules/exporting', // adds Exporting button/menu to chart
//     'themes/grid'        // applies global 'grid' theme to all charts
),
   "options"=>"{
  chart: {
    type: 'column'
  },
  title: {
    text: 'Product Sales'
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['".$cat."'],
    crosshair: true
  },
  yAxis: {
    
    title: {
      text: 'Sales in numbers '
    }
  },
 tooltip: {
        headerFormat: '<span style='font-size:11px'>{point.key}</span><br>',
        pointFormat: '<span style='color:{point.color}'>Total : </span><b>{point.y}</b><br/>'
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
  series: [{
        name: '".$catstatus."',
        data: [".rtrim($chartdata,',')."]
      }]
}"
]); 
?>
<br/><br/>
<?php
$this->Widget('ext.highcharts.HighchartsWidget', [
    'scripts' => array(
     'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
     'modules/exporting', // adds Exporting button/menu to chart
//     'themes/grid'        // applies global 'grid' theme to all charts
),
   'options'=>"{
      title: { 'text': 'Yearly Sales' },
      xAxis: {
         categories: ['".implode("','", $salesweekdate)."']
      },
      yAxis: {
         title: { 'text': 'Sales in numbers' }
      },
      tooltip: {
    headerFormat: '<span style='font-size:10px;width:300px'>{point.key}</span><table>',
    pointFormat: '<tr><td style='color:{series.color};padding:0'> </td> <td style='padding:0'><b>{point.y:.1f} </b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
   
  },
      series: [
         { 'name': '".$catstatus."', 'data': [".implode(",", $salesweekdata)."] }
      ]
   }"
]);

}

?>
