@extends('visitors::includes.html')
@section('content')

<div class="container" style="margin-top: 25px;">
    <div class="row">
        <div class="col-sm-3">
            <div class="card success">
                <!--
                <img class="card-img-top img-fluid" src="" alt="Card image cap">
                -->
                <div class="card-block">
                    <div class="card-header">
                        <h4 class="card-title">New Visitors Today</h4>
                    </div>
                    <p class="card-text quantity" id="new_visitors"></p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Total Visitors</h4>
                </div>
                <div class="card-block">

                    <p class="card-text quantity" id="total_visitors"></p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Active IP</h4>
                </div>

                <div class="card-block">

                    <p class="card-text quantity active" id="active_ip"></p>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blocked IP</h4>
                </div>
                <div class="card-block">

                    <p class="card-text quantity blocked" id="blocked_ip"></p>

                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <canvas id="myChart" width="400" height="150"></canvas>

    </div>
</div>

@endsection

@section('customStyle')
<style>
    .card-text.quantity {
        text-align: center;
        font-size: 50px;
    }

    .active {

        color: green;
    }

    .blocked {
        color: darkred;
    }
</style>
@endsection

@section('scripts')
<script>
    $.ajax({
        url: "{{route('visitors.today')}}",
        success: function(response) {
            $("#new_visitors").text(response)
        }
    })
    $.ajax({
        url: "{{route('visitors.total')}}",
        success: function(response) {
            $("#total_visitors").text(response)
        }
    })
    $.ajax({
        url: "{{route('visitors.active')}}",
        success: function(response) {
            $("#active_ip").text(response)
        }
    })
    $.ajax({
        url: "{{route('visitors.blocked')}}",
        success: function(response) {
            $("#blocked_ip").text(response)
        }
    })
</script>
<script>
    $.ajax({
        url: "{{route('visitors.graphic')}}",
        success: function(response) {
            console.dir(response.data);
            createGraphic(response);
        }
    })

    function createGraphic(response) {
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: response.labels,
                datasets: [{

                    data: response.data,
                    backgroundColor: [
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)'
                    ],
                    borderColor: [

                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)',
                        'rgba(52, 58, 255, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false
                },
            }
        });
    }
</script>
@endsection
