@props([
    'items' => [],
])

@if (count($items) > 0)
    <nav class="mb-4 text-sm text-gray-500">
        <ol class="flex items-center gap-2">
            @foreach ($items as $item)
                <li>
                    @if (!$loop->last && isset($item['url']))
                        <a href="{{ $item['url'] }}" class="hover:text-gray-700">
                            {{ $item['label'] }}
                        </a>
                    @else
                        <span class="text-gray-700">
                            {{ $item['label'] }}
                        </span>
                    @endif
                </li>

                @if (!$loop->last)
                    <li>/</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif