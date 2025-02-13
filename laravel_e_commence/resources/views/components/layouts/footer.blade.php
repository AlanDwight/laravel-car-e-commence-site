@props(['footerLinks' => ''])
{{-- @hasSection ('footerLinks') --}}
    <footer>
        {{-- @section('footerLinks')
            <a href="">Link 1</a>
            <a href="">Link 2</a>
        @show --}}

        <a href="">Link 1</a>
        <a href="">Link 2</a>
        {{ $footerLinks }} 

        {{-- @yield('footerLinks') --}}
    </footer>
{{-- @endif --}}