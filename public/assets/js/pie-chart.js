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
                backgroundColor: ['#328E6E', '#67AE6E', '#90C67C', '#E1EEBC','#DDEB9D','#A0C878','#3D8D7A','B3D8A8','#FBFFE4','#B8D576','#AAB99A','#AEEA94','#889E73','#B1C29E'],
                borderColor: ['#328E6E', '#67AE6E', '#90C67C', '#E1EEBC','#DDEB9D','#A0C878','#3D8D7A','B3D8A8','#FBFFE4','#B8D576','#AAB99A','#AEEA94','#889E73','#B1C29E'],
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
