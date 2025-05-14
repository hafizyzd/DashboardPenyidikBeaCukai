document.addEventListener('DOMContentLoaded', function () {
    var labels = JSON.parse(document.getElementById('labelsData').textContent);
    var data = JSON.parse(document.getElementById('dataValues').textContent);

    var ctx = document.getElementById('violationChart').getContext('2d');
    var violationChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels, // Labels from the Blade data
            datasets: [{
                label: 'Jenis Pelanggaran',
                data: data, // Data from the Blade data
                backgroundColor: ['#309898', '#FF9F00', '#F4631E', '#CB0404','#626F47','#A4B465','#A5B68D','#2C3930','#C1CFA1','#B9B28A','#504B38','#124076','#8CB9BD','#638889'],
                borderColor: ['#309898', '#FF9F00', '#F4631E', '#CB0404','#626F47','#A4B465','#A5B68D','#2C3930','#C1CFA1','#B9B28A','#504B38','#124076','#8CB9BD','#638889'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                             return tooltipItem.label + ': ' + tooltipItem.raw + ' Pelanggaran';
                        }
                    }
                }
            }
        }
    });
});
