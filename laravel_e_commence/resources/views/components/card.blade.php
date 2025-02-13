@props(['color' => 'green', 'bgColor' => 'yellow'])

{{-- {{ dump($attributes) }} --}}
<div {{ $attributes -> class("card card-text-$color card-bg-$bgColor") -> merge(['lang' => 'en']) }}>
    
    <div {{ $title->attributes->class('card-header')->merge(['lang' => 'us']) }}>{{ $title }}</div>
    
    @if($slot->isEmpty())
        <p>Provide some content</p>
    @else
        {{ $slot }}
    @endif
    
    <div class="card-footer">{{ $footer }}</div>

</div>