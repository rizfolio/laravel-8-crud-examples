@extends('admin.layouts.master')

@section('content')
 
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
            </div>

        </div>

        <div class="row bg-white">

            <div class="col-12  show_cart_1">

                <div id="barchart_values" style="width: 900px; height: 300px;"></div>

            </div>

        </div>

 


@endsection

@push('footer')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ["Element", "Posts", { role: "style" } ],

            @foreach ($users as $user)
                ["{{ $user->name  }}", {{ $user->posts_count }}, " {{ Helper::getHexColor() }}"],
            @endforeach

          ]);
    
          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);
    
          var options = {
            title: "Users with number of posts",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
          };
          var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
          chart.draw(view, options);
      }
      </script>
    

    

@endpush



