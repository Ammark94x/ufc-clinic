@extends('templates.backendTemplate')
@section('title','Customer Reporting')
@section('customStyles')
@endsection
@section('content')
<div class="page-title">
<h3>Customer Reporting</h3>
</div>
<select class="form-control" id="graph-select">
      <option value="monthlygraph">By Month</option>
      <option value="yearlygraph">By Year</option>
    </select>
{{-- <div id="monthlygraph"></div> --}}
<div id="yearlygraph"></div>
@endsection
@section('customScripts')
<script src="{{url('/')}}/js/highcharts.js"></script>
<script src="{{url('/')}}/js/exporting.js"></script>
<script type="text/javascript">
  $(function(){    
    $.getJSON("{{route('expensesByMonth')}}", function(json){
    Highcharts.chart('yearlygraph', {
        chart: {
            type: 'column'
        },
        title: {
            text: '2018 Report'
        },
        xAxis: {
            categories: json.months.reverse(),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Profit & Expense'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Expenses',
            data: json.Expenses.reverse()

        }, {
            name: 'Profit',
            data: json.Profit.reverse()          
        }]
    });
});
      $.getJSON("{{route('customerByMonth')}}", function(json){
    Highcharts.chart('monthlygraph', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Customers'
        },
        xAxis: {
            categories: json.months.reverse(),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'No. of Customers'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Customers',
            data: json.customers.reverse()

        }]
    });
  });
    $(document).on('change','#graph-select',function(){
      if($(this).val()=="monthlygraph") {
        $("#monthlygraph").show(300);
      } else {
        $("#monthlygraph").hide(300);
      }
      if($(this).val()=="yearlygraph") {
        $("#yearlygraph").show(300);
      } else {
        $("#yearlygraph").hide(300);
      }
    });
  });
</script>
@endsection