<div class="breadcrumb-inner breadcrumb-dark bg-cover bg-center bg-no-repeat relative"
     style="background-image: url('{{ $image }}'); filter: brightness({{ $brightness ?? '0.6' }}); height: {{ $height ?? '400px' }}; border-radius: {{ $radius ?? '10px' }};">
    
    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    {{-- Slot untuk konten tambahan --}}
    <div class="relative z-10">
        {{ $slot }}
    </div>
</div>
