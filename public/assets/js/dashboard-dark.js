(function ($) {
  //'use strict';

  // --- Visit Sale Chart ---
  if ($("#visit-sale-chart").length) {
    const ctx = document.getElementById('visit-sale-chart').getContext("2d");

    // Gradient oluştur
    const gradientViolet = ctx.createLinearGradient(0, 0, 0, 180);
    gradientViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
    gradientViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');

    const gradientBlue = ctx.createLinearGradient(0, 0, 0, 180);
    gradientBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
    gradientBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');

    const gradientRed = ctx.createLinearGradient(0, 0, 0, 180);
    gradientRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
    gradientRed.addColorStop(1, 'rgba(254, 112, 150, 1)');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG'],
        datasets: [
          { label: "CHN", data: [20,40,15,35,25,50,30,20], backgroundColor: gradientViolet, borderColor: 'rgba(218,140,255,1)', borderWidth: 1 },
          { label: "USA", data: [40,30,20,10,50,15,35,40], backgroundColor: gradientRed, borderColor: 'rgba(255,191,150,1)', borderWidth: 1 },
          { label: "UK", data: [70,10,30,40,25,50,15,30], backgroundColor: gradientBlue, borderColor: 'rgba(54,215,232,1)', borderWidth: 1 }
        ]
      },
      options: {
        responsive: true,
        animation: { duration: 0 },
        hover: { animationDuration: 0 },
        plugins: { legend: { display: true } },
        scales: { y: { beginAtZero: true } }
      }
    });
  }

  // --- Traffic Chart ---
  if ($("#traffic-chart").length) {
    const ctx = document.getElementById('traffic-chart').getContext("2d");

    const gradientViolet = ctx.createLinearGradient(0, 0, 0, 180);
    gradientViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
    gradientViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');

    const gradientBlue = ctx.createLinearGradient(0, 0, 0, 180);
    gradientBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
    gradientBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');

    const gradientRed = ctx.createLinearGradient(0, 0, 0, 180);
    gradientRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
    gradientRed.addColorStop(1, 'rgba(254, 112, 150, 1)');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG'],
        datasets: [
          { label: "CHN", data: [20,40,15,35,25,50,30,20], backgroundColor: gradientViolet, borderColor: 'rgba(218,140,255,1)', borderWidth: 1 },
          { label: "USA", data: [40,30,20,10,50,15,35,40], backgroundColor: gradientRed, borderColor: 'rgba(255,191,150,1)', borderWidth: 1 },
          { label: "UK", data: [70,10,30,40,25,50,15,30], backgroundColor: gradientBlue, borderColor: 'rgba(54,215,232,1)', borderWidth: 1 }
        ]
      },
      options: {
        responsive: true,
        animation: { duration: 0 },
        hover: { animationDuration: 0 },
        plugins: { legend: { display: true } },
        scales: { y: { beginAtZero: true } }
      }
    });
  }

  // --- Datepicker ---
  if ($("#inline-datepicker").length) {
    $('#inline-datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
    });
  }

  // --- Banner ---
  if ($.cookie('purple-pro-banner') != "true") {
    $('#proBanner').addClass('d-flex');
    $('.navbar').removeClass('fixed-top');
  } else {
    $('#proBanner').addClass('d-none');
    $('.navbar').addClass('fixed-top');
  }

  $('#bannerClose').click(function () {
    $('#proBanner').addClass('d-none').removeClass('d-flex');
    $('.navbar').removeClass('pt-5').addClass('fixed-top');
    $('.page-body-wrapper').addClass('proBanner-padding-top');
    var date = new Date();
    date.setTime(date.getTime() + 24*60*60*1000);
    $.cookie('purple-pro-banner', "true", { expires: date });
  });

})(jQuery);
