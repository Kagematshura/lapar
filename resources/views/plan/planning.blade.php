@extends('layout.app')

@section('content')
<body class="bg-[#185863]">

    <div class="flex h-screen overflow-auto w-full">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 w-full p-4">

            <!-- Calorie Chart Section -->
            <div class="col-span-1 bg-white rounded-lg shadow-lg">
                <h2 class="text-center text-lg font-bold mb-4">PERENCANAAN</h2>
                <hr class="mb-4">
                <div class="flex justify-center">
                    <div class="w-full">
                        <canvas id="calorieChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Calorie Input & Table -->
            <div class="col-span-1 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-center text-lg font-bold mb-4 break-words">Masukkan intake kalori anda disini</h2>
            <hr class="mb-4">

            <!-- Check if BMR is set -->
            @if(is_null($bmr))
                <div class="text-center mb-4 text-red-600 font-semibold">
                    <p>BMR belum di set! Coba hitung dahulu di kalkulator.</p>
                </div>
            @else
            <div class="text-center mb-4 text-green-600 font-semibold">
                <p>Kuota kalori anda per hari (dalam kcal)</p>        
                <p class="text-xl">{{ $bmr }}</p>
                </div>
            @endif

            <form id="calorieForm" class="mb-4" action="{{ route('store.planning') }}" method="POST">
                @csrf
                <input
                    id="kcal_intake"
                    name="kcal_intake"
                    placeholder="Masukkan intake kalori disini..."
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
                        @if(is_null($bmr)) bg-gray-200 cursor-not-allowed @endif"
                    @if(is_null($bmr)) disabled @endif
                    title="@if(is_null($bmr)) Please calculate your BMR first in the calculator! @endif">
                <button
                    id="submitCalorieBtn"
                    type="submit"
                    class="w-full py-2 px-4 mt-4 font-semibold rounded-md
                        @if(is_null($bmr)) bg-gray-400 cursor-not-allowed text-gray-700 @else bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 @endif"
                    @if(is_null($bmr)) disabled @endif
                    title="@if(is_null($bmr)) You need to calculate your BMR first! @endif">
                    Masukkan
                </button>
            </form>
                <hr class="mb-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="px-6 py-4 border text-lg">INTAKE KALORI</th>
                                <th class="px-6 py-4 border text-lg">DIMASUKKAN PADA</th>
                            </tr>
                        </thead>
                        <tbody id="calorieTableBody">
                            @foreach ($planning as $plans)
                                <tr>
                                    <td class="px-4 py-2 border text-center">{{ $plans->kcal_intake }}</td>
                                    <td class="px-4 py-2 border text-center">{{ $plans->created_at->timezone('Asia/Jakarta') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Body Weight Chart Section -->
            <div class="col-span-1 bg-white rounded-lg shadow-lg">
                <h2 class="text-center text-lg font-bold mb-4">Berat Badan</h2>
                <hr class="mb-4">
                <div class="flex justify-center">
                    <div class="w-full">
                        <canvas id="BBChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Body Weight Input & Table -->
            <div class="col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-center text-lg font-bold mb-4">Masukkan berat badan anda saat ini</h2>
                <hr class="mb-4">
                <form id="bbForm" class="mb-4" action="{{ route('store.bb') }}" method="POST">
                    @csrf
                    <input id="body_weight" name="body_weight" placeholder="Masukkan berat badan disini..." class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button id="submitBBBtn" type="submit" class="w-full py-2 px-4 mt-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Input
                    </button>
                </form>
                <hr class="mb-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="px-4 py-2 border">BERAT BADAN</th>
                                <th class="px-4 py-2 border">DIMASUKKAN PADA</th>
                            </tr>
                        </thead>
                        <tbody id="BBTableBody">
                            @foreach ($berat as $bb)
                                <tr>
                                    <td class="px-4 py-2 border text-center">{{ $bb->body_weight }}</td>
                                    <td class="px-4 py-2 border text-center">{{ $bb->created_at->timezone('Asia/Jakarta') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Initialize Chart
        document.addEventListener("DOMContentLoaded", function () {
            function extractTableData(tableId) {
                let labels = [];
                let data = [];

                document.querySelectorAll(`#${tableId} tr`).forEach((row) => {
                    let value = row.cells[0]?.innerText.trim();
                    let dateTime = row.cells[1]?.innerText.trim();

                    if (value && dateTime) {
                        let dateOnly = dateTime.split(" ")[0];
                        labels.push(dateOnly);
                        data.push(parseFloat(value));
                    }
                });

                return { labels, data };
            }

            function createChart(chartId, label, color, tableId, unit) {
                let ctx = document.getElementById(chartId).getContext("2d");
                let { labels, data } = extractTableData(tableId);

                return new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: label,
                                data: data,
                                backgroundColor: `${color}20`,
                                borderColor: color,
                                borderWidth: 2,
                                pointBackgroundColor: color,
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
                                title: {
                                    display: true,
                                    text: `Nilai dalam ${unit}`,
                                },
                                beginAtZero: true,
                                suggestedMax: Math.max(...data, 100) + 10,
                            },
                        },
                    },
                });
            }
            let calorieChart = createChart("calorieChart", "Calorie Intake", "rgba(54, 162, 235, 1)", "calorieTableBody", "kcal");
            let BBChart = createChart("BBChart", "Body Weight", "rgba(255, 99, 132, 1)", "BBTableBody", "kg");
        });
    </script>
</body>
@endsection
