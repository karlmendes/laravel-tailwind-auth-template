@props([
    'title',
    'description' => null,
])

<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
        {{ $title }}
    </h1>

    @if ($description)
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            {{ $description }}
        </p>
    @endif
</div>