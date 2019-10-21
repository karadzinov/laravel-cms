<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

{{-- pages and visitors --}}
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['{{trans('admin.google.day')}}', '{{trans('admin.google.page-views')}}', '{{trans('admin.google.visitors')}}'],
      @foreach($totalVisitors as $visitors)
         ['{{$visitors['date']->format('M d')}}', {{$visitors['pageViews']}}, {{$visitors['visitors']}}],
      @endforeach
    ]);

    var options = {
      chart: {
        title: '{{trans('admin.google.visitors-and-pages-title')}}',
        // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('visitors-and-pages'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

{{-- most visited pages --}}
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawColColors);

  function drawColColors() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Url');
        data.addColumn('number', '{{trans('admin.google.page-views')}}');
        // data.addColumn('number', 'Energy Level');

        data.addRows([
          @foreach($mostVisitedPages as $page)
            ['{{$page['url']}}', {{$page['pageViews']}}],
          @endforeach
        ]);

        var options = {
          title: '{{trans('admin.google.most-visited-title')}}',
          colors: ['#3366CC'],
          hAxis: {
            title: '{{trans('admin.google.pages')}}',
            viewWindow: {
              min: [7, 30, 0],
              max: [17, 30, 0]
            }
          },
          vAxis: {
            title: '{{trans('admin.google.page-views')}}'
          }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('most-visited'));
        chart.draw(data, options);
      }
</script>

{{-- referral    --}}
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawBasic);

  function drawBasic() {

        var data = google.visualization.arrayToDataTable([
          ['{{trans('admin.google.url')}}', '{{trans('admin.google.page-views')}}',],
          @foreach($referrs as $referr)
            ['{{$referr['url']}}', {{$referr['pageViews']}}],
          @endforeach
        ]);

        var options = {
          title: '{{trans('admin.google.referral-title')}}',
          chartArea: {width: '50%'},
          hAxis: {
            title: '{{trans('admin.google.referrals-total')}}',
            minValue: 0
          },
          vAxis: {
            title: '{{trans('admin.google.options')}}'
          }
        };

        var chart = new google.visualization.BarChart(document.getElementById('referrals'));

        chart.draw(data, options);
      }
</script>

{{-- new/returning users --}}
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['{{trans('admin.google.type')}}', '{{trans('admin.google.sessions')}}'],
      @foreach($userTypes as $type)
      	['{{$type['type']}}',{{$type['sessions']}}],
      @endforeach
    ]);

    var options = {
      title: '{{trans('admin.google.user-types-title')}}',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('users-type'));
    chart.draw(data, options);
  }
</script>

{{-- devices --}}
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['{{trans('admin.google.device')}}', '{{trans('admin.google.visits')}}'],
      @foreach($devices as $device)
      	['{{$device[0]}}', {{$device[1]}}],
      @endforeach
    ]);

    var options = {
      title: '{{trans('admin.google.devices-title')}}',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('users-devices'));
    chart.draw(data, options);
  }
</script>

{{-- browsers --}}
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['{{trans('admin.google.browsers')}}', '{{trans('admin.google.sessions')}}'],
      @foreach($browsers as $browser)
        ['{{$browser['browser']}}', {{$browser['sessions']}}],
      @endforeach
    ]);

      var options = {
        title: '{{trans('admin.google.browsers-title')}}'
      };

      var chart = new google.visualization.PieChart(document.getElementById('users-browsers'));

      chart.draw(data, options);
    }
</script>

{{-- map --}}
<script type="text/javascript">
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['{{trans('admin.google.country')}}', '{{trans('admin.google.visits')}}'],
          @foreach($visitsPerCountry as $visits)
            ['{{$visits[0]}}', {{$visits[1]}}],
          @endforeach
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('users-regions'));

        chart.draw(data, options);
      }
</script>

<div class="container-fluid mt-30">
    	<div class="row">

        <div class="col-lg-6 col-md-12 col-sm-12 mb-30">
          <div id="visitors-and-pages" class="chart"></div>
        </div>

    		<div class="col-lg-6 col-md-12 col-sm-12 mb-30">
    			<div id="most-visited" class="chart"></div>
    		</div>

        <div class="col-lg-6 col-md-12 col-sm-12 mb-30">
          <div id="referrals" class="chart"></div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 mb-30">
           <div id="users-type" class="chart"></div>
        </div>
    		
    		<div class="col-lg-6 col-md-12 col-sm-12 mb-30">
    			<div id="users-devices" class="chart"></div>
    		</div>

    		<div class="col-lg-6 col-md-12 col-sm-12 mb-30">
    			    <div id="users-browsers" class="chart"></div>
    		</div>
    		
        <div class="col-md-12 col-sm-12 mb-30">
          <div id="users-regions" class="world-map"></div>
        </div>

    	</div>
    </div>