<header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-gray-200 bg-white px-6 dark:border-gray-800 dark:bg-gray-900">

    <div>
        <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Painel Administrativo
        </h2>
    </div>

    

    <div class="flex items-center gap-4">
        <button
    type="button"
    id="theme-toggle"
    class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800"
    title="Alternar tema"
>
    <svg
        id="theme-toggle-light-icon"
        class="hidden h-5 w-5"
        fill="none"
        stroke="currentColor"
        stroke-width="1.8"
        viewBox="0 0 24 24"
    >
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 3v2.25M12 18.75V21M4.22 4.22l1.59 1.59M18.19 18.19l1.59 1.59M3 12h2.25M18.75 12H21M4.22 19.78l1.59-1.59M18.19 5.81l1.59-1.59M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5z" />
    </svg>

    <svg
        id="theme-toggle-dark-icon"
        class="hidden h-5 w-5"
        fill="none"
        stroke="currentColor"
        stroke-width="1.8"
        viewBox="0 0 24 24"
    >
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M21.75 15.5A9 9 0 118.5 2.25a7 7 0 0013.25 13.25z" />
    </svg>
</button>

        <div class="flex items-center gap-3">
            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-gray-200 text-sm font-semibold text-gray-700 dark:bg-gray-700 dark:text-white">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>

            <div class="hidden sm:block">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-gray-500 dark:text-gray-400">
                    {{ auth()->user()->email }}
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="rounded-lg px-3 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-950">
                    Sair
                </button>
            </form>
        </div>

    </div>

</header>