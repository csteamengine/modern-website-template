$(document).ready(function(){
    let ctx = document.getElementById('myChart').getContext('2d');
    let json = $('#myChart').data('data');
    let labels = [];
    let data  = [];

    json.map((item) => {
        labels.push(item[0]);
        data.push(item[1]);
    });

    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',
                data: data,
                backgroundColor: "rgba(0, 153, 204, 0.1)",
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
})
