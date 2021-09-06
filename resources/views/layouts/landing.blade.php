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
        <div class="col-span-2 h-full bg-gray-500"></div>
        <div class="col-span-4 h-full">
          <canvas id="c" width="1000" height="780"></canvas>
        </div>
      </div>
      <button id="animate" class="mt-5 font-sans text-base bg-indigo-900 px-4 py-2 text-indigo-50 rounded-sm">Start</button>
    </div>
  </main>
</body>

<script>
  $(document).ready(function(){

    // Initialize left
    var left_margin = 130;
    var canvas = new fabric.Canvas('c');
    canvas.width  = $(window).width()*2; 
    canvas.height = 1000;

    // Arrows Region

    init_arrows();

    function init_arrows(){
    // left arrows
    var group_arrow_program_counter_w_bus = new fabric.Group([ new fabric.Rect({
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      flipX: true,
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      flipX: true,
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: 15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
      top: -4,
      width: 7,
      height: 5,
      angle: 90,
      left: 42
    })
    , new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      flipX: true,
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 80,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('4', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15,
      flipX: true,
      angle: 270
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      width: 38,
      height: 1
    }), 
    new fabric.Text('8', {
      fontSize: 12,
      fill: '#8B5CF6',
      originX: 'center',
      originY: 'center',
      top: -15,
      angle: 270
    }),
    new fabric.Triangle({
      fill: '#8B5CF6',
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

    canvas.add(group_arrow_subtractor_accumulator, group_arrow_b_regs_subtractor, group_arrow_output_regs_binary, group_arrow_regs_controller, group_arrow_input_mar_ram);
    }
    // fabric.Image.fromURL('/')

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
      left: 75 + left_margin,
      top: 75,
      selectable: false
    });

    var group_program_counter = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
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
      left: 55 + left_margin,
      top: 570,
      selectable: false
    });

   // Initialize left end region

    canvas.add(group_moving_process, group_program_counter, group_input_mar, group_ram, group_instruction_regs, group_controller_sequence);

  //  Initialize right 
    var group_accumulator = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 140,
      height: 50,
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
      left: 565 + left_margin,
      top: 680,
      selectable: false
    });

  // Initialize right end region
    
  canvas.add(group_accumulator, group_adder_subtractor, group_b_register, group_output_regs, group_binary_display, group_state);

  // Initialize W-BUS

  var group_w_bus = new fabric.Group([ 
      new fabric.Rect({
      fill: 'transparent',
      originX: 'center',
      originY: 'center',
      width: 150,
      height: 584,
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
      left: 305 + left_margin,
      top: 60,
      selectable: false
    });

  // Initialize W-BUS region

  // Initialize Left Pins

    var pin_program_counter_clk = new fabric.Group([ new fabric.Rect({
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 45,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 45,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLR', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 51,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Ep', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#5B21B6',
      originX: 'center',
      originY: 'center',
      width: 49,
      height: 1,
      left: 15.5
    }), 
    new fabric.Text('Cp', {
      fontSize: 12,
      fill: '#5B21B6',
      originX: 'center',
      originY: 'center',
      fontWeight: '800',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 48,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Lm', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 46,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 50,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Er', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 50,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Li', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 40,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 40,
      height: 1,
      left: 15
    }), 
    new fabric.Text('CLR', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 49,
      height: 1,
      left: 15
    }), 
    new fabric.Text('Ei', {
      fontSize: 12,
      fill: '#A78BFA',
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
    

  canvas.add(pin_instruction_regs_Ei, pin_instruction_regs_CLR, pin_instruction_regs_CLK, pin_instruction_regs_Li, pin_RAM_Er, pin_input_mar_CLK, pin_input_mar_Lm, pin_program_counter_ep, pin_program_counter_clr, pin_program_counter_clk, pin_program_counter_cp);  
  // Initialize Left Pins end region


  // Initialzie right pins 

  var pin_accumulator_la = new fabric.Group([ new fabric.Rect({
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('La', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Ea', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Su', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Eu', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 19
    }), 
    new fabric.Text('Lb', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('Lo', {
      fontSize: 12,
      fill: '#A78BFA',
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
      fill: '#A78BFA',
      originX: 'center',
      originY: 'center',
      width: 44,
      height: 1,
      left: 16
    }), 
    new fabric.Text('CLK', {
      fontSize: 12,
      fill: '#A78BFA',
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
    //   fill: '#A78BFA',
    //   originX: 'center',
    //   originY: 'center',
    //   width: 45,
    //   height: 1,
    //   left: 15
    // }), 
    // new fabric.Text('CLR', {
    //   fontSize: 12,
    //   fill: '#A78BFA',
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
    //   fill: '#A78BFA',
    //   originX: 'center',
    //   originY: 'center',
    //   width: 51,
    //   height: 1,
    //   left: 15
    // }), 
    // new fabric.Text('Ep', {
    //   fontSize: 12,
    //   fill: '#A78BFA',
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
    //   fill: '#5B21B6',
    //   originX: 'center',
    //   originY: 'center',
    //   width: 49,
    //   height: 1,
    //   left: 15.5
    // }), 
    // new fabric.Text('Cp', {
    //   fontSize: 12,
    //   fill: '#5B21B6',
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

    var animateBtn = document.getElementById('animate');
    animateBtn.onclick = function() {
      animateBtn.disabled = true;

      //left bottom right
      group_moving_process.animate('left', group_moving_process.left === 75 + left_margin ? 332 + left_margin : 75 + left_margin, {
        duration: 1000,
        onChange: canvas.renderAll.bind(canvas),
        onComplete: function() {
          
          pin_program_counter_cp.item(1).set({
            fill: '#A78BFA',
            fontWeight: '400'
          });

          pin_input_mar_CLK.item(1).set({
            fill: '#5B21B6',
            fontWeight: '800'
          });

          group_moving_process.animate('top', '+=133', {
            duration: 1000,
            onChange: canvas.renderAll.bind(canvas),
            onComplete: function() {

              group_moving_process.animate('left', 75 + left_margin, {
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

