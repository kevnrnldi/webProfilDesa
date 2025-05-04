const eduCtx = document.getElementById('educationChart').getContext('2d');
const educationChart = new Chart(eduCtx, {
    type: 'pie',
    data: {
        labels: JSON.parse(document.getElementById('educationLabels').textContent), // Contoh: ['SD', 'SMP', 'SMA', 'Strata 1', ...]
        datasets: [{
            data: JSON.parse(document.getElementById('educationCounts').textContent), // Contoh: [150, 200, 300, 80, ...]
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#9C27B0',
                '#00BCD4', '#FF9800', '#E91E63', '#3F51B5'
            ],
            borderColor: '#fff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: false,
                text: 'Distribusi Pendidikan Penduduk'
            },
            legend: {
                display: false
            }
        }
    }
});