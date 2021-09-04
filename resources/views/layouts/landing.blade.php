<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/460/fabric.min.js" integrity="sha512-ybPp3kCrNQXdvTfh99YLIdnajWnQvHuEKDJ+b26mxI9w+pLhnBo3HmNLJ1pEUBFO1Q0bfJxApeqecNbmaV763g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Styles -->
  <title>Sap1</title>
</head>

<body class="antialiased font-sans">
  <main>
    <div class="w-full" align="center" style="margin-top: 10vh;">
      <div class="grid grid-cols-4 gap-x-4 mx-56">
        <div class="col-span-2 h-full bg-gray-500"></div>
        <div class="col-span-2 h-full">
          <canvas id="c" width="750" height="750"></canvas>
        </div>
      </div>
      <button id="animate" class="mt-5 font-sans text-base bg-indigo-900 px-4 py-2 text-indigo-50 rounded-sm">Start</button>
    </div>
  </main>
</body>

<script>
  $(document).ready(function(){
    var canvas = new fabric.Canvas('c');
    canvas.width  = $(window).width()*2; 
    canvas.height = 1000;

    var rect = new fabric.Rect({
      fill: '#5B21B6',
      originX: 'center',
      originY: 'center',
      width: 100,
      height: 20
    });

    var text = new fabric.Text('1001010', {
      fontSize: 16,
      fill: 'white',
      originX: 'center',
      originY: 'center'
    });

    var group = new fabric.Group([ rect, text ], {
      left: 75,
      top: 75,
    });

    canvas.add(group);

    var animateBtn = document.getElementById('animate');
    animateBtn.onclick = function() {
      animateBtn.disabled = true;

      //left bottom right
      group.animate('left', group.left === 75 ? 300 : 75, {
        duration: 1000,
        onChange: canvas.renderAll.bind(canvas),
        onComplete: function() {

          group.animate('top', '+=200', {
            duration: 1000,
            onChange: canvas.renderAll.bind(canvas),
            onComplete: function() {

              group.animate('left', 75, {
                duration: 1000,
                onChange: canvas.renderAll.bind(canvas),
                onComplete: function() {
                  animateBtn.disabled = false;
                },
                
                easing: fabric.util.easeInOutBack
              });
            },
            easing: fabric.util.easeInOutBack
          });
        },
        easing: fabric.util.easeInOutBack
      });

     
    };
  });
 
</script>

</html>

