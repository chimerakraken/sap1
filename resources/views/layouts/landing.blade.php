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
      <div class="grid grid-cols-6 gap-x-6 mx-48">
        <div class="col-span-2 h-full bg-gray-500 relative">
          <div class="w-full h-full px-5 py-8 text-center"> <span class=" text-7xl font-semibold text-gray-50">LDA <span id="LDA">14</span></span></div>
          <button id="animate" class="mt-5 font-sans bg-indigo-900 px-4text-indigo-50 rounded-sm w-full absolute left-0 bottom-0 py-9 text-indigo-50 text-2xl">Start</button>
        </div>
        <div class="col-span-4 h-full">
          <canvas id="c" width="1000" height="780"></canvas>
        </div>
      </div>
    </div>
  </main>
</body>

<script>
  $(document).ready(function(){

    $(document).on('keypress',function(e) {
    if(e.which == 13) {
      $('#animate').click();
    }
    });

    // Initialize left
    var left_margin = 130;
    var indigo = "#312E81";
    var fiery_red = "#B91C1C";
    var canvas = new fabric.Canvas('c');
    canvas.width  = $(window).width()*2; 
    canvas.height = 1000;

    // Arrows Region

    init_arrows();

    function init_arrows(){
    // left arrows
    var group_arrow_program_counter_w_bus = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 210 + left_margin,
      top: 65,
      selectable: false
    });

    var group_arrow_w_bus_input_mar = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      flipX: true,
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 210 + left_margin,
      top: 200,
      flipX: true,
      selectable: false
    });

    var group_arrow_RAM_w_bus = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',  
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 210 + left_margin,
      top: 330,
      selectable: false
    });


    var group_arrow_w_bus_instruction_regs = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      flipX: true,
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 210 + left_margin,
      top: 450,
      flipX: true,
      selectable: false
    });

    
    var group_arrow_instruction_regs_w_bus = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: 15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 210 + left_margin,
      top: 485,
      selectable: false
    });

    // right arrows group_arrow_w_bus_accumulator
    var group_arrow_w_bus_accumulator = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
    , new fabric.Triangle({
      fill: indigo,
      top: 4,
      width: 7,
      height: 5,
      angle: 270,
      left: -41
    })
     ], {
      left: 470 + left_margin,
      top: 65,
      selectable: false
    });

    
    var group_arrow_adder_substractor_w_bus = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      flipX: true,
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 470 + left_margin,
      top: 200,
      flipX: true,
      selectable: false
    });

    var group_arrow_w_bus_w_regs = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 470 + left_margin,
      top: 330,
      selectable: false
    });

    var group_arrow_w_bus_w_output_regs = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
     ], {
      left: 470 + left_margin,
      top: 460,
      selectable: false
    });

    canvas.add(group_arrow_w_bus_w_output_regs, group_arrow_w_bus_w_regs, group_arrow_adder_substractor_w_bus, group_arrow_w_bus_accumulator, group_arrow_program_counter_w_bus, group_arrow_w_bus_input_mar, group_arrow_RAM_w_bus, group_arrow_instruction_regs_w_bus, group_arrow_w_bus_instruction_regs);
    
    // vertical arrows 

    var group_arrow_input_mar_ram = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 145 + left_margin,
      top: 255,
      angle: 90,
      selectable: false
    });

    var group_arrow_regs_controller = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 145 + left_margin,
      top: 520,
      angle: 90,
      selectable: false
    });

    var group_arrow_output_regs_binary = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 655 + left_margin,
      top: 520,
      angle: 90,
      selectable: false
    });

    var group_arrow_b_regs_subtractor = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15,
      flipX: true,
      angle: 270
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 655 + left_margin,
      top: 255,
      angle: 90,
      flipX: true,
      selectable: false
    });

    var group_arrow_subtractor_accumulator = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 655 + left_margin,
      top: 122,
      angle: 90,
      selectable: false
    });


    var group_arrow_controller_bottom = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('12', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 145 + left_margin,
      top: 655,
      angle: 90,
      selectable: false
    });

    canvas.add(group_arrow_controller_bottom, group_arrow_subtractor_accumulator, group_arrow_b_regs_subtractor, group_arrow_output_regs_binary, group_arrow_regs_controller, group_arrow_input_mar_ram);
    }
    // fabric.Image.fromURL('/')

    var group_program_counter = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('Program Counter', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55 + left_margin,
      top: 38,
      selectable: false
    });


    var group_input_mar = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('MAR', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55 + left_margin,
      top: 170,
      selectable: false
    });

    var group_ram = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }),  
    new fabric.Text('16x8 PROM', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55 + left_margin,
      top: 300,
      selectable: false
    });

    var group_instruction_regs = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('Instruction Register', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55 + left_margin,
      top: 435,
      selectable: false
    });

    var group_controller_sequence = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    // new fabric.Text('Controller/Sequencer', {
    new fabric.Text('Control Unit', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 55 + left_margin,
      top: 570,
      selectable: false
    });

   // Initialize left end region

    canvas.add(group_program_counter, group_input_mar, group_ram, group_instruction_regs, group_controller_sequence);

  //  Initialize right 
    var group_accumulator = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    // new fabric.Text('Accumulator', {
    new fabric.Text('A Register', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 565 + left_margin,
      top: 38,
      selectable: false
    });
    
    var group_adder_subtractor = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    // new fabric.Text('Adder/Subtractor', {
    new fabric.Text('Arithmetic Logic Unit', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 565 + left_margin,
      top: 170,
      selectable: false
    });

    var group_b_register = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('B Register', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 565 + left_margin,
      top: 300,
      selectable: false
    });

    var group_output_regs = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('Output Register', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 565 + left_margin,
      top: 435,
      selectable: false
    });

    var group_binary_display = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('Binary Display', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 565 + left_margin,
      top: 570,
      selectable: false
    });

    var group_state = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('State', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 565 + left_margin,
      top: 680,
      selectable: false
    });

  // Initialize right end region
    
  canvas.add(group_accumulator, group_adder_subtractor, group_b_register, group_output_regs, group_binary_display);

  // Initialize W-BUS

  var group_w_bus = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 150,
      height: 584,
      stroke: indigo,
      strokeWidth: 2,
    }), 
    new fabric.Text('W-BUS', {
      fontSize: 16,
      fill: indigo,
      top: -40,
      originX: 'center',
      originY: 'center',
      fontWeight: 'bold',
      fontFamily: 'Calibri'
    }) 
      ], {
      left: 305 + left_margin,
      top: 60,
      selectable: false
    });

  // Initialize W-BUS region

  // Initialize Left Pins

    var pin_program_counter_clk = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 45,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 120,
      top: 75,
      selectable: false
    });

    var pin_program_counter_clr = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 45,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLR', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 120,
      top: 88,
      selectable: false
    });


    var pin_program_counter_ep = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 51,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Ep', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 120,
      top: 100,
      selectable: false
    });

    var pin_program_counter_cp = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 49,
      height: 1,
      left: 15.5
    }), 
    new fabric.Text('Cp', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 120,
      top: 60,
      selectable: false
    });

    var pin_input_mar_Lm = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 48,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Lm', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 120,
      top: 200,
      selectable: false
    });

    var pin_input_mar_CLK = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 46,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 120,
      top: 220,
      selectable: false
    });

    var pin_RAM_Er= new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 50,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Er', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 120,
      top: 350,
      selectable: false
    });

    var pin_instruction_regs_Li= new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 50,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Li', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 123,
      top: 460,
      selectable: false
    });

    
    var pin_instruction_regs_CLK= new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 40,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 123,
      top: 475,
      selectable: false
    });

    var pin_instruction_regs_CLR= new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 40,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLR', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 123,
      top: 485,
      selectable: false
    });

    var pin_instruction_regs_Ei= new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 49,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Ei', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: -18
    })
     ], {
      left: 123,
      top: 495,
      selectable: false
    });
    

    var pin_arrow_controller_clk = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 40,
      height: 1
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      flipX: true,
      left: 38
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 119,
      top: 605,
      flipX: true,
      selectable: false
    });



    var pin_arrow_controller_clr = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 40,
      height: 1
    }), 
    new fabric.Text('CLR', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      flipX: true,
      left: 38
    }),
    new fabric.Triangle({
      fill: indigo,
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 23
    })
     ], {
      left: 119,
      top: 625,
      flipX: true,
      selectable: false
    });

    // var pin_program_counter_Cp = new fabric.Group([ new fabric.Rect({
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   width: 45,
    //   height: 1,
    //   left: 15
    // }), 
    // new fabric.Text('Cp', {
    //   fontSize: 12,
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   fontWeight: '400',
    //   fontFamily: 'Calibri',
    //   top: 0,
    //   left: -18
    // })
    //  ], {
    //   left: 120,
    //   top: 75,
    //   selectable: false
    // });
    // ic.Group([ new fabric.Rect({
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   width: 45,
    //   height: 1,
    //   left: 15
    // }), 
    // new fabric.Text('CLR', {
    //   fontSize: 12,
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   fontWeight: '400',
    //   fontFamily: 'Calibri',
    //   top: 0,
    //   left: -18
    // })
    //  ], {
    //   left: 120,
    //   top: 88,
    //   selectable: false
    // });

    
    var pin_controller_Cp = new fabric.Text('Cp', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 178,
      selectable: false
    })

    var pin_controller_Ep = new fabric.Text('Ep', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 193,
      selectable: false
    })

    var pin_controller_Lm = new fabric.Text('Lm', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 210,
      selectable: false
    })

    var pin_controller_Er = new fabric.Text('Er', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 226,
      selectable: false
    })

    var pin_controller_Li = new fabric.Text('Li', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 242,
      selectable: false
    })

    var pin_controller_Ei = new fabric.Text('Ei', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 253,
      selectable: false
    })

    
    var pin_controller_La = new fabric.Text('La', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 265,
      selectable: false
    })

    
    var pin_controller_Ea = new fabric.Text('Ea', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 279,
      selectable: false
    })


    var pin_controller_Su = new fabric.Text('Su', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 297,
      selectable: false
    })

    var pin_controller_Eu = new fabric.Text('Eu', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 312,
      selectable: false
    })

    var pin_controller_Lb = new fabric.Text('Lb', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 326,
      selectable: false
    })

    var pin_controller_Lo = new fabric.Text('Lo', {
      fontSize: 14,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 720,
      left: 340,
      selectable: false
    })


  canvas.add(pin_controller_Ep, pin_controller_Lo, pin_controller_Lb, pin_controller_Eu, pin_controller_Su, pin_controller_Ea, pin_controller_La, pin_controller_Ei, pin_controller_Li, pin_controller_Er, pin_controller_Lm, pin_controller_Cp, pin_arrow_controller_clr, pin_arrow_controller_clk, pin_instruction_regs_Ei, pin_instruction_regs_CLR, pin_instruction_regs_CLK, pin_instruction_regs_Li, pin_RAM_Er, pin_input_mar_CLK, pin_input_mar_Lm, pin_program_counter_ep, pin_program_counter_clr, pin_program_counter_clk, pin_program_counter_cp);  
  // Initialize Left Pins end region


  // Initialzie right pins 

  var pin_accumulator_la = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('La', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 46
    })
     ], {
      left: 836.5,
      top: 67,
      selectable: false
    });

    var pin_accumulator_clk = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 80,
      selectable: false
    });


    var pin_accumulator_ea = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Ea', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 95,
      selectable: false
    });


    var pin_adder_substractor_su = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Su', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 200,
      selectable: false
    });


    
    var pin_adder_substractor_eu = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Eu', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 220,
      selectable: false
    });


    var pin_b_register_lb = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Lb', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 330,
      selectable: false
    });

    var pin_b_register_CLK = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 350,
      selectable: false
    });


    var pin_output_regs_Lo = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('Lo', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 470,
      selectable: false
    });

    var pin_output_regs_CLK = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: indigo,
      originX: 'center',
      originY: 'center',
      fontWeight: '400',
      fontFamily: 'Calibri',
      top: 0,
      left: 49
    })
     ], {
      left: 836.5,
      top: 490,
      selectable: false
    });


    canvas.add(pin_output_regs_CLK, pin_output_regs_Lo, pin_b_register_CLK, pin_b_register_lb, pin_adder_substractor_eu, pin_adder_substractor_su, pin_accumulator_ea, pin_accumulator_clk, pin_accumulator_la);

    // var pin_program_counter_clr = new fabric.Group([ new fabric.Rect({
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   width: 45,
    //   height: 1,
    //   left: 15
    // }), 
    // new fabric.Text('CLR', {
    //   fontSize: 12,
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   fontWeight: '400',
    //   fontFamily: 'Calibri',
    //   top: 0,
    //   left: -18
    // })
    //  ], {
    //   left: 120,
    //   top: 88,
    //   selectable: false
    // });


    // var pin_program_counter_ep = new fabric.Group([ new fabric.Rect({
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   width: 51,
    //   height: 1,
    //   left: 15
    // }), 
    // new fabric.Text('Ep', {
    //   fontSize: 12,
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   fontWeight: '400',
    //   fontFamily: 'Calibri',
    //   top: 0,
    //   left: -18
    // })
    //  ], {
    //   left: 120,
    //   top: 100,
    //   selectable: false
    // });

    // var pin_program_counter_cp = new fabric.Group([ new fabric.Rect({
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   width: 49,
    //   height: 1,
    //   left: 15.5
    // }), 
    // new fabric.Text('Cp', {
    //   fontSize: 12,
    //   fill: indigo,
    //   originX: 'center',
    //   originY: 'center',
    //   fontWeight: '800',
    //   fontFamily: 'Calibri',
    //   top: 0,
    //   left: -18
    // })
    //  ], {
    //   left: 120,
    //   top: 60,
    //   selectable: false
    // });

  // initialize right pins end region
  canvas.add(group_w_bus);

  var group_LDAState1_program_counter_mar = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 100,
      height: 20
    }), 
    new fabric.Text('0000', {
      fontSize: 16,
      fill: 'white',
      originX: 'center',
      originY: 'center'
    }) ], {
      left: 75 + left_margin,
      top: 75,
      selectable: false
    });

    var group_LDAState1_PROM = new fabric.Group([ new fabric.Rect({
      fill: indigo,
      originX: 'center',
      originY: 'center',
      width: 100,
      height: 20
    }), 
    new fabric.Text('0000' + ' ' + parseInt( $('#LDA').html()).toString(2), {
      fontSize: 16,
      fill: 'white',
      originX: 'center',
      originY: 'center'
    }) ], {
      left: 75 + left_margin,
      top: 341,
      selectable: false
    });

    var animateBtn = document.getElementById('animate');
    animateBtn.onclick = function() {
    canvas.add(group_LDAState1_program_counter_mar); 
    LDAState1();
    };

    function LDAState1(){
      pin_program_counter_ep.item(1).set({
                fill: fiery_red,
                fontWeight: '800'
              });

              pin_program_counter_ep.item(0).set({
                fill: fiery_red,
              });

      pin_input_mar_Lm.item(1).set({
                fill: fiery_red,
                fontWeight: '800'
              });

              pin_input_mar_Lm.item(0).set({
                fill: fiery_red,
              });

        // console.log(pin_program_counter_ep);
      animateBtn.disabled = true;
      group_LDAState1_program_counter_mar.animate('left', group_LDAState1_program_counter_mar.left === 75 + left_margin ? 332 + left_margin : 75 + left_margin, {
            duration: 2000,
            onChange: canvas.renderAll.bind(canvas),
            onComplete: function() {
              
          

              // pin_input_mar_CLK.item(1).set({
              //   fill: indigo,
              //   fontWeight: '800'
              // });

              group_LDAState1_program_counter_mar.animate('top', '+=133', {
                duration: 2000,
                onChange: canvas.renderAll.bind(canvas),
                onComplete: function() {

                  group_LDAState1_program_counter_mar.animate('left', 75 + left_margin, {
                    duration: 2000,
                    onChange: canvas.renderAll.bind(canvas),
                    onComplete: function() {
                      animateBtn.disabled = false;


                      canvas.add(group_LDAState1_PROM);

                    },
                    
                    easing: fabric.util.easeInOutBack
                  });
                },
                easing: fabric.util.easeInOutBack
              });
            },
            easing: fabric.util.easeInOutBack
          });

    }


  });
 


</script>

</html>

