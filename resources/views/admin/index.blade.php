@extends('layouts.app')

@section('content')                 
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<!-- Make Graphic Chart Visitor -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Grafik Pengunjung</div>
            <div class="card-body">
                <canvas id="visitorChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
{{-- {{ $visitors }} --}}
<script type="text/javascript">
    var ctx = document.getElementById('visitorChart').getContext('2d');
        var visitors = @json($visitors);

        var dates = visitors.map(visitor => visitor.visit_date);
        var counts = visitors.map(visitor => visitor.visit_count);

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: counts,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
</script>
@endsection