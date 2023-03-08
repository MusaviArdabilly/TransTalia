// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["EMERALD", "EMINENENCE", "INTERCEPTOR", "BERYL", "CONVINCER", "VENCENDOR", "RESOLUTE", "ALFAYIZ", "INTERPID", "AURORA", "ORION", "ELF"],
    datasets: [{
      data: [10, 8, 7, 5, 12, 15, 5, 9, 3, 6, 15, 5, 2],
      backgroundColor: ['#b15928', '#ffff99', '#6a3d9a',
      '#cab2d6', '#ff7f00', '#fdbf6f',
      '#e31a1c', '#fb9a99', '#33a02c',
      '#b2df8a', '#1f78b4', '#a6cee3'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
