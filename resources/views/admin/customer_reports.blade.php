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
<div id="monthlygraph"></div>
<div id="yearlygraph" style="display: none"></div>
<hr>
<div class="row">
  <div class="col-md-4">    
    <div class="form-group">
      <select class="filter_month form-control">
        <option value="">By Month</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <select class="filter_year form-control">
        <option value="">By Year</option>
      </select>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <select class="filter_city form-control">
        <option value="">By City</option>
      </select>
    </div>
  </div>
</div>
<div class="grid simple">
    <div class="grid-title no-border">
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>    
    <div class="grid-body no-border">
      <table class="table" id="reporting_table" style="width: 100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th class="_city">City</th>
            <th>Join Date</th>
            <th class="_month" style="display: none">Month</th>
            <th class="_year" style="display: none">Year</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $value)
          <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->mobile}}</td>
            <td>{{$value->location}}</td>
            <td>{{$value->created_at}}</td>
            <td style="display: none">{{date('M',strtotime($value->created_at))}}</td>
            <td style="display: none">{{date('Y',strtotime($value->created_at))}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
@section('customScripts')
<script src="{{url('/')}}/js/highcharts.js"></script>
<script src="{{url('/')}}/js/exporting.js"></script>
<script type="text/javascript">
  $(function(){    
    $.getJSON("{{route('customerByYear')}}", function(json){
    Highcharts.chart('yearlygraph', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Yearly Customers'
        },
        xAxis: {
            categories: json.years.reverse(),
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
    $("#reporting_table").DataTable({
      initComplete: function () {
        this.api().columns('._month').every( function () {
            
            var column = this;
            var select = $('.filter_month')
                //.appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var search = [];

                      $.each($('.filter_month option:selected'), function(){
                          search.push($(this).val());
                      });
                      
                      search = search.join('|');
                    column
                        .search( search, true, false )
                        .draw();
                } );
            column.data().unique().sort().each( function ( d, j ) {
                if(d!="")
                {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                }
            } );
        } );

        this.api().columns('._year').every( function () {
            
            var column = this;
            var select = $('.filter_year')
                //.appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var search = [];

                      $.each($('.filter_year option:selected'), function(){
                          search.push($(this).val());
                      });
                      
                      search = search.join('|');
                    column
                        .search( search, true, false )
                        .draw();
                } );
            column.data().unique().sort().each( function ( d, j ) {
                if(d!="")
                {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                }
            } );
        } );

        this.api().columns('._city').every( function () {
            
            var column = this;
            var select = $('.filter_city')
                //.appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var search = [];

                      $.each($('.filter_city option:selected'), function(){
                          search.push($(this).val());
                      });
                      
                      search = search.join('|');
                    column
                        .search( search, true, false )
                        .draw();
                } );
            column.data().unique().sort().each( function ( d, j ) {
                if(d!="")
                {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                }
            } );
        } );
      }
    });
  });
</script>
@endsection