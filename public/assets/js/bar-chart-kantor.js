var ctx = document.getElementById('BarChart').getContext('2d');
var barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: JSON.parse(document.getElementById('labelsDataKantor').textContent), // Labels are kantor names
        datasets: [{
            label: 'Potensi Kehilangan Penerimaan Negara',
            data: JSON.parse(document.getElementById('dataPotensiKantor').textContent), // Data for 'potensi_kehilangan_penerimaan_negara'
            backgroundColor: '#FF9F00',
            borderColor: '#FF9F00',
            borderWidth: 1
        },
        {
            label: 'Perkiraan Nilai Barang',
            data: JSON.parse(document.getElementById('dataNilaiKantor').textContent), // Data for 'perkiraan_nilai_barang'
            backgroundColor: '#F4631E',
            borderColor: '#F4631E',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                       return 'Rp ' + value.toLocaleString(); // Format y-axis as Rupiah with commas
                    }
                }
            }
        },
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        // Format tooltips as Rupiah with commas (using Indonesian locale)
                           var formattedValue = new Intl.NumberFormat().format(tooltipItem.raw);
                            return tooltipItem.dataset.label + ': Rp ' + formattedValue; // Format tooltips as Rupiah with commas
                    }
                }
            }
        }
    }
});
