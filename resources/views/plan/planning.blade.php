@extends('layout.app')

@section('content')
<body class="flex bg-[#185863] h-screen">

    <main class="flex flex-1 ml-40 items-center justify-center">
        <div class="grid grid-cols-2 gap-6 w-full max-w-5xl">
            <!-- Chart Section -->
            <div class="col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-center text-lg font-bold mb-4">PLANNING</h2>
                <hr class="mb-4">
                <div class="flex justify-center">
                    <!-- Chart Placeholder -->
                    <div class="w-[90%] h-64">
                        <canvas id="calorieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Input and Table Section -->
            <div class="col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-center text-lg font-bold mb-4">Put in Calorie Intake Quota Here</h2>
                <hr class="mb-4">
                <!-- Input Form -->
                <div class="mb-4">
                    <input type="text" id="calorieInput" placeholder="Enter Calorie Quota" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="button" id="inputBtn" class="w-full py-2 px-4 mt-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Input
                    </button>
                </div>
                <hr class="mb-4">
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">USERNAME</th>
                                <th class="px-4 py-2 border">CALORIE INTAKE</th>
                                <th class="px-4 py-2 border">REGISTERED AT</th>
                            </tr>
                        </thead>
                        <tbody id="calorieTableBody">
                            <!-- Dynamic Rows will be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize Chart
        const ctx = document.getElementById('calorieChart').getContext('2d');
        const calorieChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                datasets: [{
                    label: 'Calorie Intake',
                    data: [4000, 1000, 1150, 2000, 1500, 3000, 2500],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 4000
                    }
                }
            }
        });

        // Input and Table Script
        document.getElementById('inputBtn').addEventListener('click', function () {
            const calorieInput = document.getElementById('calorieInput').value;
            if (calorieInput) {
                const tableBody = document.getElementById('calorieTableBody');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-4 py-2 border text-center">1</td>
                    <td class="px-4 py-2 border text-center">John Doe</td>
                    <td class="px-4 py-2 border text-center">${calorieInput}</td>
                    <td class="px-4 py-2 border text-center">${new Date().toLocaleString()}</td>
                `;
                tableBody.appendChild(row);
                document.getElementById('calorieInput').value = '';
            } else {
                alert('Please enter a valid calorie quota!');
            }
        });
    </script>
</body>
@endsection
