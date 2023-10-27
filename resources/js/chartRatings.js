let data = monthlyData; // Assumi che monthlyData contenga i dati nel formato desiderato
let labels = data.map(function(item) {
    return item.month;
});
let averageValues = data.map(function(item) {
    return item.average;
});
let reviewCounts = data.map(function(item) {
    return item.numRatings;
});

let ctx1 = document.getElementById('chartRatings').getContext('2d');
let myChart1;

let ctx2 = document.getElementById('chartReviewCounts').getContext('2d');
let myChart2;

function createChart(ctx, data, labels, label, backgroundColor, borderColor) {
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
}

function updateChart(selectedTimeFrame) {
    let filteredData;

    if (selectedTimeFrame === 'month') {
        filteredData = monthlyData; // Usa i dati mensili
    } else {
        filteredData = yearlyData; // Usa i dati annuali
    }

    labels = filteredData.map(function(item) {
        return selectedTimeFrame === 'month' ? item.month : item.year;
    });
    averageValues = filteredData.map(function(item) {
        return item.average;
    });
    reviewCounts = filteredData.map(function(item) {
        return item.numRatings;
    });

    if (myChart1) {
        myChart1.destroy();
    }

    if (myChart2) {
        myChart2.destroy();
    }

    myChart1 = createChart(ctx1, averageValues, labels, 'Media Voti', 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 1)');
    myChart2 = createChart(ctx2, reviewCounts, labels, 'Numero di Recensioni', 'rgba(192, 75, 75, 0.2)', 'rgba(192, 75, 75, 1)');
}

document.getElementById('timeFrameSelect').addEventListener('change', function() {
    const selectedTimeFrame = this.value;
    updateChart(selectedTimeFrame);
});

updateChart('month');