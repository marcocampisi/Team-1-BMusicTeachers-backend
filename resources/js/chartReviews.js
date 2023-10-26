 // Elemento canvas per il grafico
 const ctx = document.getElementById('reviewChart').getContext('2d');

 // Opzioni di default per il grafico
 const defaultData = {
     labels: monthlyReviewsCounts.map(item => item.month), // Usa i nomi dei mesi
     datasets: [{
         label: 'Recensioni Mensili',
         data: monthlyReviewsCounts.map(item => item.numMessages),
         backgroundColor: 'rgba(75, 192, 192, 0.2)',
         borderColor: 'rgba(75, 192, 192, 1)',
         borderWidth: 1,
     }],
 };

 // Crea il grafico iniziale
 const myChart = new Chart(ctx, {
     type: 'bar',
     data: defaultData,
     options: {
         responsive: true,
         scales: {
             y: {
                 beginAtZero: true,
             },
         },
     },
 });

 // Aggiungi un ascoltatore per la selezione della visualizzazione
 const chartTypeSelect = document.getElementById('reviewChartType');
 chartTypeSelect.addEventListener('change', function () {
     const selectedType = this.value;

     // Aggiorna il grafico in base alla selezione
     if (selectedType === 'monthly') {
         myChart.data.labels = monthlyReviewsCounts.map(item => item.month);
         myChart.data.datasets[0].data = monthlyReviewsCounts.map(item => item.numMessages);
     } else if (selectedType === 'yearly') {
         myChart.data.labels = yearlyReviewsCounts.map(item => item.year);
         myChart.data.datasets[0].data = yearlyReviewsCounts.map(item => item.numMessages);
     }

     myChart.update(); // Aggiorna il grafico
 });