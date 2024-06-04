document.addEventListener("DOMContentLoaded", function() {
  function fetchEmployesByStat(statType, statValue) {
    console.log(`Fetching employees by ${statType} with value ${statValue}`);
    fetch(`/employes-by-stat?statType=${statType}&statValue=${statValue}`)
      .then(response => response.json())
      .then(data => {
        console.log('Received data:', data); // Ajoutez cette ligne pour journaliser les données reçues
        let tbody = document.getElementById('employesModalBody');
        tbody.innerHTML = '';
        let totalSalaire = 0;
        if (data.length > 0) {
          data.forEach(employe => {
            let age = moment().diff(employe.DateNaissance, 'years');
            totalSalaire += employe.SalairedeBase || 0;
            let row = `<tr>
              <td>${employe.IDEmploye || ''}</td>
              <td>${employe.Nom || ''}</td>
              <td>${employe.Prenom || ''}</td>
              <td>${age || ''}</td>
              <td>${employe.Genre || ''}</td>
              <td>${employe.departement ? employe.departement.NomDepartement : ''}</td>
              <td>${employe.poste ? employe.poste.TitrePoste : ''}</td>
              <td>${employe.SalairedeBase ? employe.SalairedeBase.toLocaleString() + ' DA' : ''}</td>
              <td>${employe.Statut || ''}</td>
            </tr>`;
            tbody.insertAdjacentHTML('beforeend', row);
          });

          // Affiche le total des salaires
          document.getElementById('totalMainDoeuvre').textContent = totalSalaire.toLocaleString();

          let modal = new bootstrap.Modal(document.getElementById('employesModal'));
          modal.show();
        } else {
          console.log('No data received');
        }
      })
      .catch(error => console.error('Error fetching employes:', error));
  }

  if (document.getElementById('repartitionGenreChart') && document.getElementById('repartitionGenreData')) {
    var repartitionGenreData = JSON.parse(document.getElementById('repartitionGenreData').textContent);
    var genreLabels = repartitionGenreData.map(function(item) {
      return item.Genre;
    });
    var genreData = repartitionGenreData.map(function(item) {
      return item.count;
    });

    var options = {
      series: [{
        name: 'Nombre d\'employés',
        data: genreData
      }],
      chart: {
        type: 'bar',
        height: 350,
        events: {
          dataPointSelection: function(event, chartContext, config) {
            fetchEmployesByStat('genre', genreLabels[config.dataPointIndex]);
          }
        }
      },
      plotOptions: {
        bar: {
          borderRadius: 5,
          horizontal: false,
        },
      },
      dataLabels: {
        enabled: false
      },
      xaxis: {
        categories: genreLabels,
      },
      yaxis: {
        title: {
          text: 'Nombre d\'employés'
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#repartitionGenreChart"), options);
    chart.render();
  }

  if (document.getElementById('repartitionAgeChart') && document.getElementById('repartitionAgeData')) {
    var repartitionAgeData = JSON.parse(document.getElementById('repartitionAgeData').textContent);
    var ageLabels = repartitionAgeData.map(function(item) {
      return item.age;
    });
    var ageData = repartitionAgeData.map(function(item) {
      return item.count;
    });

    var options = {
      series: [{
        name: 'Nombre d\'employés',
        data: ageData
      }],
      chart: {
        type: 'bar',
        height: 350,
        events: {
          dataPointSelection: function(event, chartContext, config) {
            fetchEmployesByStat('age', ageLabels[config.dataPointIndex]);
          }
        }
      },
      plotOptions: {
        bar: {
          borderRadius: 5,
          horizontal: false,
        },
      },
      dataLabels: {
        enabled: false
      },
      xaxis: {
        categories: ageLabels,
      },
      yaxis: {
        title: {
          text: 'Nombre d\'employés'
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#repartitionAgeChart"), options);
    chart.render();
  }

  if (document.getElementById('repartitionDepartementChart') && document.getElementById('repartitionDepartementData')) {
    var repartitionDepartementData = JSON.parse(document.getElementById('repartitionDepartementData').textContent);
    var departementLabels = repartitionDepartementData.map(function(item) {
      return item.NomDepartement.replace(/^Departement\s/, '');
    });
    var departementData = repartitionDepartementData.map(function(item) {
      return item.employes_count;
    });

    var options = {
      series: [{
        name: 'Nombre d\'employés',
        data: departementData
      }],
      chart: {
        type: 'bar',
        height: 350,
        events: {
          dataPointSelection: function(event, chartContext, config) {
            fetchEmployesByStat('departement', departementLabels[config.dataPointIndex]);
          }
        }
      },
      plotOptions: {
        bar: {
          borderRadius: 5,
          horizontal: false,
        },
      },
      dataLabels: {
        enabled: false
      },
      xaxis: {
        categories: departementLabels,
        labels: {
          rotate: -90,
          style: {
            fontSize: '10px',
            fontFamily: 'Helvetica, Arial, sans-serif'
          }
        }
      },
      yaxis: {
        title: {
          text: 'Nombre d\'employés'
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#repartitionDepartementChart"), options);
    chart.render();
  }
});
