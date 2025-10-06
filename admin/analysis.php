<!DOCTYPE html>
<html>
<head>
    <title>Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* .chart-container {
            width: 600px;
            margin: 2rem auto;
        }
        <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f9;
    }

    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 20px;
      padding: 20px;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    .card h3 {
      margin-bottom: 15px;
      color: #333;
    }

    canvas {
      max-width: 100%;
      height: auto;
    } */
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f4f6f9;
    }
    
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .header h1 {
      color: #333;
      margin: 0;
    }
    
    .date-display {
      display: flex;
      align-items: center;
      background-color: #f8f9fa;
      padding: 8px 15px;
      border-radius: 8px;
      font-size: 14px;
    }
    
    .dashboard {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 20px;
      padding: 20px;
    }
    
    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      display: flex;
      flex-direction: column;
    }
    
    .card h3 {
      margin-top: 0;
      margin-bottom: 15px;
      color: #333;
      display: flex;
      align-items: center;
    }
    
    .card-icon {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      color: white;
      font-size: 16px;
    }
    
    .sales-icon {
      background-color: #36a2eb;
    }
    
    .stock-icon {
      background-color: #ff6384;
    }
    
    .revenue-icon {
      background-color: #9966ff;
    }
    
    canvas {
      max-width: 100%;
      height: auto;
    }
    
    .metrics {
      display: flex;
      margin-bottom: 15px;
    }
    
    .metric {
      flex: 1;
      text-align: center;
    }
    
    .metric-value {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
    
    .metric-label {
      font-size: 14px;
      color: #777;
    }
    
    .recent-section {
      padding: 0 20px 20px 20px;
    }
    
    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    
    .section-title {
      font-size: 20px;
      color: #333;
    }
    
    .table-container {
      background-color: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }
    
    th {
      color: #555;
      font-weight: 600;
    }
    
    tr:last-child td {
      border-bottom: none;
    }
    </style>
</head>
<body>
<div class="header">
    <h2 style="text-align:center;">Product Analytics</h2>
    </div>
    <div class="dashboard">
        <div class="card">
    <div class="chart-container">
        <canvas id="salesChart"></canvas>
    </div>
    </div>
    <div class="card">
    <div class="chart-container">
        <canvas id="stockChart"></canvas>
    </div>
    </div>
    <div class="card">
    <div class="chart-container">
        <canvas id="revenueChart"></canvas>
        </div>
    </div>
    </div>
    <script>
        fetch('analytics_data.php')
            .then(response => response.json())
            .then(data => {
                const salesNames = data.sales.map(item => item.productname);
                const salesQty = data.sales.map(item => parseInt(item.total_sold));

                const stockNames = data.stock.map(item => item.productname);
                const stockQty = data.stock.map(item => item.stock);

                const weeks = data.revenue.map(item => "Week " + item.week_number);
                const revenues = data.revenue.map(item => parseFloat(item.weekly_revenue));

                // Sales Chart
                new Chart(document.getElementById('salesChart'), {
                    type: 'bar',
                    data: {
                        labels: salesNames,
                        datasets: [{
                            label: 'Units Sold',
                            data: salesQty,
                            backgroundColor:  '#36a2eb'
                        }]
                    }
                });

                // Stock Chart
                new Chart(document.getElementById('stockChart'), {
                    type: 'pie',
                    data: {
                        labels: stockNames,
                        datasets: [{
                            label: 'Stock',
                            data: stockQty,
                            backgroundColor: [
                                '#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#2ecc71'
                            ]
                        }]
                    }
                });

                // Revenue Chart
                new Chart(document.getElementById('revenueChart'), {
                    type: 'line',
                    data: {
                        labels: weeks,
                        datasets: [{
                            label: 'Weekly Revenue',
                            data: revenues,
                            fill: false,
                            borderColor: 'rgba(153, 102, 255, 1)',
                            tension: 0.1
                        }]
                    }
                });
            });
    </script>
</body>
</html>
