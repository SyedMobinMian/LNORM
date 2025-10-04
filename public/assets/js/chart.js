document.addEventListener('DOMContentLoaded', function () {
    if (typeof Chart !== 'undefined') {
        new Chart(document.getElementById('bankChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Bank Balance',
                    data: [20000, 25000, 22000, 24000, 23000, 27000],
                    borderColor: '#007bff',
                    fill: false
                }]
            }
        });

        new Chart(document.getElementById('inventoryChart'), {
            type: 'bar',
            data: {
                labels: ['Product A', 'Product B', 'Product C', 'Product D'],
                datasets: [{
                    label: 'Inventory Stock',
                    data: [150, 250, 320, 400],
                    backgroundColor: '#28a745',
                    borderColor: '#28a745',
                    borderWidth: 1
                }]
            }
        });

        new Chart(document.getElementById('salesChart'), {
            type: 'pie',
            data: {
                labels: ['Product A', 'Product B', 'Product C'],
                datasets: [{
                    data: [40, 30, 30],
                    backgroundColor: ['#007bff', '#ffc107', '#28a745']
                }]
            }
        });

        new Chart(document.getElementById('profitLossChart'), {
            type: 'doughnut',
            data: {
                labels: ['Profit', 'Loss'],
                datasets: [{
                    data: [70, 30],
                    backgroundColor: ['#28a745', '#dc3545']
                }]
            }
        });
    }
});

// Inside theme.js
function applyThemeToCharts(theme) {
    // destroy old chart
    if (window.salesChart) window.salesChart.destroy();

    // create new chart with theme-based colors
    renderSalesChart(theme); 
}


// document.addEventListener("DOMContentLoaded", function () {
//   if (typeof Chart === 'undefined') return;
//   const bankCtx = document.getElementById('bankChart');
//   if (bankCtx) {
//     new Chart(bankCtx, {
//       type: 'line',
//       data: {
//         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
//         datasets: [{
//           label: 'Bank Balance',
//           data: [20000, 25000, 22000, 24000, 23000, 27000],
//           borderColor: '#007bff',
//           fill: false
//         }]
//       }
//     });
//   }
//   const inventoryCtx = document.getElementById('inventoryChart');
//   if (inventoryCtx) {
//     new Chart(inventoryCtx, {
//       type: 'bar',
//       data: {
//         labels: ['Product A', 'Product B', 'Product C', 'Product D'],
//         datasets: [{
//           label: 'Inventory Stock',
//           data: [150, 250, 320, 400],
//           backgroundColor: '#28a745',
//           borderColor: '#28a745',
//           borderWidth: 1
//         }]
//       }
//     });
//   }
//   const salesCtx = document.getElementById('salesChart');
//   if (salesCtx) {
//     new Chart(salesCtx, {
//       type: 'pie',
//       data: {
//         labels: ['Product A', 'Product B', 'Product C'],
//         datasets: [{
//           data: [40, 30, 30],
//           backgroundColor: ['#007bff', '#ffc107', '#28a745']
//         }]
//       }
//     });
//   }
//   const profitLossCtx = document.getElementById('profitLossChart');
//   if (profitLossCtx) {
//     new Chart(profitLossCtx, {
//       type: 'doughnut',
//       data: {
//         labels: ['Profit', 'Loss'],
//         datasets: [{
//           data: [70, 30],
//           backgroundColor: ['#28a745', '#dc3545']
//         }]
//       }
//     });
//   }
// });
