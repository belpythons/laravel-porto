@props(['color' => 'bg-purple-500', 'top' => '0', 'left' => '0', 'size' => 'w-64 h-64', 'delay' => '0s'])

<div {{ $attributes->merge(['class' => 'absolute rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob']) }}
    style="background-color: {{ $color }}; top: {{ $top }}; left: {{ $left }}; width: {{ $size }}; height: {{ $size }}; animation-delay: {{ $delay }}; box-shadow: 0 0 80px {{ $color }};">
</div>

<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }

        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }
</style>