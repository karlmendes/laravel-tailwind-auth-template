@php
    use App\Helpers\MenuHelper;
    use Illuminate\Support\Facades\Route;

    $menus = config('menu');
@endphp

<aside class="hidden w-72 border-r border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-950 lg:block">

    <div class="flex h-16 items-center border-b border-gray-200 px-6 dark:border-gray-800">
        <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-gray-900 dark:text-white">
            {{ config('app.name', 'Laravel Admin') }}
        </a>
    </div>

    <nav class="p-4">

        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">
            Menu
        </p>

        <div class="space-y-1">
            @foreach ($menus as $menu)

                @php
                    $hasChildren = isset($menu['children']) && count($menu['children']) > 0;

                    $canViewMenu = empty($menu['permission']) || auth()->user()->can($menu['permission']);

                    if ($hasChildren) {
                        $visibleChildren = collect($menu['children'])
                            ->filter(function ($child) {
                                return empty($child['permission']) || auth()->user()->can($child['permission']);
                            })
                            ->values()
                            ->all();

                        $canViewMenu = count($visibleChildren) > 0;
                    }

                    $isActive = isset($menu['route']) && MenuHelper::isActive($menu['route']);
                    $hasActiveChild = $hasChildren ? MenuHelper::hasActiveChild($menu['children']) : false;
                @endphp

                @if (!$canViewMenu)
                    @continue
                @endif

                @if ($hasChildren)

                    <div class="space-y-1">
                        <div class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-gray-500 dark:text-gray-400">
                            <span>{{ $menu['title'] }}</span>
                        </div>

                        <div class="ml-3 space-y-1 border-l border-gray-200 pl-3 dark:border-gray-800">

                            @foreach ($visibleChildren as $child)

                                @php
                                    $childActive = MenuHelper::isActive($child['route'] ?? null);
                                    $childUrl = isset($child['route']) && Route::has($child['route'])
                                        ? route($child['route'])
                                        : '#';
                                @endphp

                                <a href="{{ $childUrl }}"
                                   class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium transition
                                   {{ $childActive
                                        ? 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white'
                                        : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800'
                                   }}">
                                    <span>{{ $child['title'] }}</span>
                                </a>

                            @endforeach

                        </div>
                    </div>

                @else

                    @php
                        $menuUrl = isset($menu['route']) && Route::has($menu['route'])
                            ? route($menu['route'])
                            : '#';
                    @endphp

                    <a href="{{ $menuUrl }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition
                       {{ $isActive
                            ? 'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white'
                            : 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800'
                       }}">

                        <span>{{ $menu['title'] }}</span>
                    </a>

                @endif

            @endforeach
        </div>

    </nav>

</aside>