// js/chart.js
document.addEventListener("DOMContentLoaded", function() {
  var ctx = document.getElementById('repartitionGenreChart').getContext('2d');
  var repartitionGenreData = JSON.parse(document.getElementById('repartitionGenreData').textContent);

  var labels = repartitionGenreData.map(item => item.Genre === 'M' ? 'Hommes' : 'Femmes');
  var data = repartitionGenreData.map(item => item.count);

  new Chart(ctx, {
      type: 'bar',
      data: {
          labels: labels,
          datasets: [{
              label: 'Nombre d\'employés',
              data: data,
              backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
              borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
              borderWidth: 1,
              borderRadius: 5
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: { display: false },
              tooltip: {
                  backgroundColor: 'rgba(0, 0, 0, 0.7)',
                  titleColor: '#fff',
                  bodyColor: '#fff'
              }
          },
          scales: {
              y: {
                  beginAtZero: true,
                  ticks: { color: '#333' },
                  grid: { color: 'rgba(0, 0, 0, 0.1)' }
              },
              x: {
                  ticks: { color: '#333' },
                  grid: { display: false }
              }
          }
      }
  });
});
