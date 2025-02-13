<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    <h1>Hello World</h1>
    <div>{{ $a + $b }}</div>
</div>
{{-- sub view --}}
@include('shared.button', [
    'text' => 'submit',
    'color' => '#aaffaa' 
    ])

@php
    $cars = [1,2,3,4,5]
@endphp

{{-- loop directive --}}
@foreach ($cars as $car)
    @include('cars.view', ['car' => $car])
@endforeach

@each('cars.view', $cars, 'car', 'cars.empty')

<p @style([
    'color: ' . $color => $red=== 'confirm', 
    'font-size: 2rem',
    'font-family: Sans-serif',
    'font-style: normal'])>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias necessitatibus asperiores, deserunt accusamus dolorem iusto?</p>
@php
    
@endphp
{{-- sub view --}}
@include('shared.alert', [
    'message' => 'hello_world', 
    'color' => 'red' 
])