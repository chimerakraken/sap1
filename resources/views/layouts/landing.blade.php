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

    // Initialize left
    var canvas = new fabric.Canvas('c');
    canvas.width  = $(window).width()*2; 
    canvas.height = 1000;
    var group_moving_process = new fabric.Group([ new fabric.Rect({
      fill: '#5B21B6',
      originX: 'center',
      originY: 'center',
      width: 100,
      height: 20
    }), 
    new fabric.Text('1001 1010', {
      fontSize: 16,
      fill: 'white',
      originX: 'center',
      originY: 'center'
    }) ], {
      left: 75,
      top: 75,
      selectable: false
    });

    var group_program_counter = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Program Counter', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55,
      top: 38,
      selectable: false
    });


    var group_input_mar = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Input and MAR', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55,
      top: 170,
      selectable: false
    });

    var group_ram = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('16x8 RAM', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55,
      top: 300,
      selectable: false
    });

    var group_instruction_regs = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Instruction Register', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55,
      top: 430,
      selectable: false
    });

    var group_controller_sequence = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Controller/Sequencer', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55,
      top: 550,
      selectable: false
    });

   // Initialize left end region

    canvas.add(group_moving_process, group_program_counter, group_input_mar, group_ram, group_instruction_regs, group_controller_sequence);

  //  Initialize right 
    var group_accumulator = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Accumulator', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 555,
      top: 38,
      selectable: false
    });
    
    var group_adder_subtractor = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Adder/Subtractor', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 555,
      top: 170,
      selectable: false
    });

    var group_b_register = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('B Register', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 555,
      top: 300,
      selectable: false
    });

    var group_output_regs = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Output Register', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 555,
      top: 430,
      selectable: false
    });

    var group_binary_display = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('Binary Display', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 555,
      top: 550,
      selectable: false
    });

    var group_state = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('State', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 555,
      top: 650,
      selectable: false
    });

  // Initialize right end region
    
  canvas.add(group_accumulator, group_adder_subtractor, group_b_register, group_output_regs, group_binary_display, group_state);

  // Initialize W-BUS

  var group_w_bus = new fabric.Group([ 
      new fabric.Rect({
      fill: 'white',
      originX: 'center',
      originY: 'center',
      width: 150,
      height: 565,
      opacity: 0.1,
      stroke: '#5B21B6',
      strokeWidth: 2,
    }), 
    new fabric.Text('W-BUS', {
      fontSize: 16,
      fill: '#5B21B6',
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 305,
      top: 60,
      selectable: false
    });

  // Initialize W-BUS region

  canvas.add(group_w_bus);

    var animateBtn = document.getElementById('animate');
    animateBtn.onclick = function() {
      animateBtn.disabled = true;

      //left bottom right
      group_moving_process.animate('left', group_moving_process.left === 75 ? 332 : 75, {
        duration: 1000,
        onChange: canvas.renderAll.bind(canvas),
        onComplete: function() {

          group_moving_process.animate('top', '+=133', {
            duration: 1000,
            onChange: canvas.renderAll.bind(canvas),
            onComplete: function() {

              group_moving_process.animate('left', 75, {
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

