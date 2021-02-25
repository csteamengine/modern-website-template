import "bootstrap";
import "jquery";
import "chart.js";

Chart.defaults.global.responsive = false;

$(document).ready(function(){

    var data = $('#chart-data').data('visits');
    var dates = [];
    var count = [];

    for (const [key, value] of Object.entries(data)) {
        dates.push(key);
        count.push(value.length);
    }

    var ctx = document.getElementById('link-analytics').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: "Visits",
                data: count,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day'
                    }
                }]
            }
        }
    });

})
