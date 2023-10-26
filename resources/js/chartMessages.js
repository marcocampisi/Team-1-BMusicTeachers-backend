 // Elemento canvas per il grafico
 const ctx = document.getElementById('messageChart').getContext('2d');

 // Opzioni di default per il grafico
 const defaultData = {
     labels: monthlyMessagesCounts.map(item => item.month), // Usa i nomi dei mesi
     datasets: [{
         label: 'Messaggi Mensili',
         data: monthlyMessagesCounts.map(item => item.numMessages),
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
 const chartTypeSelect = document.getElementById('chartType');
 chartTypeSelect.addEventListener('change', function () {
     const selectedType = this.value;

     // Aggiorna il grafico in base alla selezione
     if (selectedType === 'monthly') {
         myChart.data.labels = monthlyMessagesCounts.map(item => item.month);
         myChart.data.datasets[0].data = monthlyMessagesCounts.map(item => item.numMessages);
     } else if (selectedType === 'yearly') {
         myChart.data.labels = yearlyMessagesCounts.map(item => item.year);
         myChart.data.datasets[0].data = yearlyMessagesCounts.map(item => item.numMessages);
     }

     myChart.update(); // Aggiorna il grafico
 });