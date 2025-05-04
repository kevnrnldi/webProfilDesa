document.addEventListener("DOMContentLoaded", function () {
    const ageGroupsEl = document.getElementById('ageGroupsData');
    const totalCountsEl = document.getElementById('totalCountsData');

    if (ageGroupsEl && totalCountsEl) {
        const ageGroups = JSON.parse(ageGroupsEl.textContent);
        const totalCounts = JSON.parse(totalCountsEl.textContent);

        const ctx = document.getElementById('populationChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ageGroups,
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: totalCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } else {
        console.warn("Data kelompok umur tidak ditemukan di halaman.");
    }
});
