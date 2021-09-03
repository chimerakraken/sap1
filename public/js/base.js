// // polyfill for svg
// (function(){ 
//     var templates = document.querySelectorAll('svg template');
//     var el, template, attribs, attrib, count, child, content;
//     for (var i=0; i<templates.length; i++) {
//       el = templates[i];
//       template = el.ownerDocument.createElement('template');
//       el.parentNode.insertBefore(template, el);
//       attribs = el.attributes;
//       count = attribs.length;
//       while (count-- > 0) {
//         attrib = attribs[count];
//         template.setAttribute(attrib.name, attrib.value);
//         el.removeAttribute(attrib.name);
//       }
//       el.parentNode.removeChild(el);
//       content = template.content;
//       while ((child = el.firstChild)) {
//         content.appendChild(child);
//       }
//     }
//   })();

// Chart.defaults.font.size = 12;
// Chart.defaults.font.weight = 500;
var ctxbar = document.getElementById('barchart');
var barchart = new Chart(ctxbar, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Sample Data',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


var ctxline = document.getElementById('linechart');
var linechart = new Chart(ctxline, {
    type: 'line',
    data: {
        labels: ['Lime', 'Blue', 'Violet', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Sample Data',
            data: [12, 19, 3, 5, 2, 3],
            tension: 0.3,
            fill: true,
            backgroundColor: [
                'rgba(101, 163, 13, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba183, 95, 134, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(101, 163, 13, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(183, 95, 134, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    // vertical line chart
    // options: {
    //     indexAxis: 'y',
    //     scales: {
    //       x: {
    //         beginAtZero: true
    //       }
    //     }
    //   }
});



var ctxdghnut = document.getElementById('doughnutchart');
var dghnutchart = new Chart(ctxdghnut, {
    type: 'doughnut',
    data: {
        labels: [
            'Red',
            'Blue',
            'Yellow'
          ],
          datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
          }]
    },
  
});

var ctxpolar = document.getElementById('polarchart');
var polarchart = new Chart(ctxpolar, {
    type: 'polarArea',
    data: {
        labels: [
            'Red',
            'Green',
            'Yellow',
            'Grey',
            'Blue'
          ],
          datasets: [{
            label: 'My First Dataset',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)'
            ]
        }]
    },
  
});

$(document).ready(function(){

    var x = window.matchMedia("(max-width: 700px)")
    sm(x); // Call listener function at run time
    x.addListener(sm);

    function sm(x) {
        let element = $(".sm-threshold");
        if ( (x.matches) && (!element.hasClass('active'))) { // If media query matches
           element.click();
        }
      }
})


