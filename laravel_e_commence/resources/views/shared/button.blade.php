<button 
    @class(['my-btns-style', 'conditionalClass' => $foo === 'bar' ])
    @style([
    'background-color: ' . $color, 
    'border : none' , 
    'padding: 20px', 
    'font-size : 2rem',
    'border-radius : 10px', 
    'cursor : pointer',
    'margin : 10px',
    'box-shadow : 1px 1px 5px gray'
    ])
    >{{$text}}</button>
