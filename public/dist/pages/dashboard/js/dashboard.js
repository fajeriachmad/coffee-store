/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace()

  // Graphs
  // var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  // var myChart = new Chart(ctx, {
  //   type: 'line',
  //   data: {
  //     labels: [
  //       'Sunday',
  //       'Monday',
  //       'Tuesday',
  //       'Wednesday',
  //       'Thursday',
  //       'Friday',
  //       'Saturday'
  //     ],
  //     datasets: [{
  //       data: [
  //         15339,
  //         21345,
  //         18483,
  //         24003,
  //         23489,
  //         24092,
  //         12034
  //       ],
  //       lineTension: 0,
  //       backgroundColor: 'transparent',
  //       borderColor: '#007bff',
  //       borderWidth: 4,
  //       pointBackgroundColor: '#007bff'
  //     }]
  //   },
  //   options: {
  //     scales: {
  //       yAxes: [{
  //         ticks: {
  //           beginAtZero: false
  //         }
  //       }]
  //     },
  //     legend: {
  //       display: false
  //     }
  //   }
  // })

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  });

  
  const TITLE = $('#title');
  const SLUG = $('#slug');
  TITLE.on('change', function() {
      fetch('/dashboard/posts/checkSlug?title=' + TITLE.val())
          .then(response => response.json())
          .then(data => SLUG.val(data.slug));
  });

  $('#image').on('change', function(e) {
      const IMAGE_PREVIEW = $('.img-preview');
      IMAGE_PREVIEW.addClass('d-block');

      let file = this.files[0];
      
      if (file) {
          const oFReader = new FileReader();
          oFReader.onload = function(oFREvent) {
              IMAGE_PREVIEW.attr('src', oFREvent.target.result);
          }
          oFReader.readAsDataURL(file);
      }

  });
})()
