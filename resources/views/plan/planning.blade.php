@extends('layout.app')

@section('content')
<body class="flex bg-[#185863] h-screen">

        <div class="ml-24 grid grid-cols-1 gap-10 w-full max-w-5xl overflow-auto w-full">
            <!-- Chart Section -->
            <div class="col-span-1 bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-center text-2xl font-bold mb-6">CALORIE INTAKE PLANNING</h2>
                <hr class="mb-6">
                <div class="flex justify-center">
                    <!-- Chart Placeholder -->
                    <div class="w-full h-96"> <!-- Increased height for the chart -->
                        <canvas id="calorieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Input and Table Section -->
            <div class="col-span-1 bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-center text-2xl font-bold mb-6">CALORIE INTAKE INPUT</h2>
                <hr class="mb-6">
                <!-- Input Form -->
                <form id="planForm" class="mb-6" action="{{ route('store.planning') }}" method="POST">
                    @csrf
                    <input id="kcal_intake" name="kcal_intake" placeholder="Enter Calorie Quota" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg"> <!-- Increased padding and font size -->
                    <button id="submitBtn" type="submit" class="w-full py-3 px-6 mt-6 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg"> <!-- Increased padding and font size -->
                        Input
                    </button>
                </form>
                <hr class="mb-6">
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="px-6 py-4 border text-lg">CALORIE INTAKE</th> <!-- Increased padding and font size -->
                                <th class="px-6 py-4 border text-lg">REGISTERED AT</th> <!-- Increased padding and font size -->
                            </tr>
                        </thead>
                        @foreach ($planning as $plans)
                        <tbody id="calorieTableBody">
                            <tr>
                                <td class="px-6 py-4 border text-center text-lg">{{ $plans->kcal_intake }}</td> <!-- Increased padding and font size -->
                                <td class="px-6 py-4 border text-center text-lg">{{ $plans->created_at->timezone('Asia/Jakarta') }}</td> <!-- Increased padding and font size -->
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Initialize Chart
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById("calorieChart").getContext("2d");

            // Function to get table data dynamically
            function getTableData() {
                let labels = [];
                let data = [];

                document.querySelectorAll("#calorieTableBody tr").forEach((row) => {
                    let kcalIntake = row.cells[0].innerText.trim();
                    let dateTime = row.cells[1].innerText.trim();

                    if (kcalIntake && dateTime) {
                        let dateOnly = dateTime.split(" ")[0]; // Extract only 'YYYY-MM-DD'
                        let formattedDate = formatDate(dateOnly); // Convert to 'MM-DD'
                        labels.push(formattedDate);
                        data.push(parseInt(kcalIntake, 10)); // Convert to integer
                    }
                });

                return { labels, data };
            }

            // Function to format 'YYYY-MM-DD' -> 'MM-DD'
            function formatDate(isoDate) {
                let dateParts = isoDate.split("-");
                return `${dateParts[1]}-${dateParts[2]}`; // Extract MM-DD
            }

            // Function to determine dynamic Y-axis max value
            function getDynamicMax(data) {
                let maxValue = Math.max(...data, 100); // Ensure there's at least a base value
                return maxValue + 100; // Add 100 over the highest value
            }

            // Get initial table data
            let { labels, data } = getTableData();

            // Initialize Chart
            let calorieChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Calorie Intake",
                            data: data,
                            backgroundColor: "rgba(54, 162, 235, 0.2)",
                            borderColor: "rgba(54, 162, 235, 1)",
                            borderWidth: 2,
                            pointBackgroundColor: "rgba(54, 162, 235, 1)",
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: true },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: getDynamicMax(data), // Set max dynamically
                        },
                    },
                },
            });

            // Function to update the chart dynamically
            function updateChart() {
                let { labels, data } = getTableData();

                calorieChart.data.labels = labels;
                calorieChart.data.datasets[0].data = data;
                calorieChart.options.scales.y.suggestedMax = getDynamicMax(data); // Update max Y dynamically
                calorieChart.update();
            }

            // Update chart when form is submitted
            document.getElementById("planForm").addEventListener("submit", function (event) {
                setTimeout(updateChart, 1000); // Delay update to allow the table to refresh
            });

            // Initial chart update
            updateChart();
        });

        // Form submission handling
        document.getElementById('planForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const intakeKcal = document.getElementById('kcal_intake').value.trim();

            if (intakeKcal) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '',
                    confirmButtonText: 'OK'
                }).then(() => {
                    this.submit();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>
</body>
@endsection
