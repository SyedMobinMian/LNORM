      
      // Toggle Sidebar Collapse
      document.getElementById("sidebarToggle").addEventListener("click", function() {
        document.getElementById("sidebar").classList.toggle("collapsed");
      });
      // Chart.js for Bank Overview
      const bankChart = new Chart(document.getElementById('bankChart'), {
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
      // Chart.js for Inventory Overview
      const inventoryChart = new Chart(document.getElementById('inventoryChart'), {
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
      // Chart.js for Sales Overview
      const salesChart = new Chart(document.getElementById('salesChart'), {
        type: 'pie',
        data: {
          labels: ['Product A', 'Product B', 'Product C'],
          datasets: [{
            data: [40, 30, 30],
            backgroundColor: ['#007bff', '#ffc107', '#28a745']
          }]
        }
      });
      // Chart.js for Profit & Loss Overview
      const profitLossChart = new Chart(document.getElementById('profitLossChart'), {
        type: 'doughnut',
        data: {
          labels: ['Profit', 'Loss'],
          datasets: [{
            data: [70, 30],
            backgroundColor: ['#28a745', '#dc3545']
          }]
        }
      });
      // Dark/Light Theme Toggle with Dynamic Icons
      document.getElementById('themeToggle').addEventListener('click', function () {
        let body = document.querySelector('html');
        let icon = this.querySelector('i');
        if (body.getAttribute('data-bs-theme') === 'light') {
          body.setAttribute('data-bs-theme', 'dark');
          icon.classList.remove('fa-sun');
          icon.classList.add('fa-moon');
        } else {
          body.setAttribute('data-bs-theme', 'light');
          icon.classList.remove('fa-moon');
          icon.classList.add('fa-sun');
        }
      });
      // Dark/Light Theme Toggle
      function toggleTheme() {
        let body = document.querySelector('html');
        if (body.getAttribute('data-bs-theme') === 'light') {
          body.setAttribute('data-bs-theme', 'dark');
        } else {
          body.setAttribute('data-bs-theme', 'light');
        }
      }
    