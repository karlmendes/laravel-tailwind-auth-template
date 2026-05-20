@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <x-admin.page-title
        title="Dashboard"
        description="Visão geral do sistema."
    />

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Usuários
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                128
            </p>

            <p class="mt-2 text-xs text-green-600 dark:text-green-400">
                +12% este mês
            </p>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Pedidos
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                846
            </p>

            <p class="mt-2 text-xs text-green-600 dark:text-green-400">
                +8% este mês
            </p>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Receita
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                R$ 54.230
            </p>

            <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                -3% este mês
            </p>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Conversão
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                4,8%
            </p>

            <p class="mt-2 text-xs text-green-600 dark:text-green-400">
                +1,2% este mês
            </p>
        </div>

    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-white/[0.03] xl:col-span-2">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Resumo
            </h2>

            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                Esta área pode ser usada futuramente para gráficos, indicadores ou informações principais do sistema.
            </p>

            <div class="mt-6 flex h-64 items-center justify-center rounded-xl border border-dashed border-gray-300 text-sm text-gray-400 dark:border-gray-700 dark:text-gray-500">
                Área de gráfico
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Atividades recentes
            </h2>

            <div class="mt-4 space-y-4">
                <div class="border-b border-gray-100 pb-3 dark:border-gray-800">
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">
                        Novo usuário cadastrado
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        há 10 minutos
                    </p>
                </div>

                <div class="border-b border-gray-100 pb-3 dark:border-gray-800">
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">
                        Pedido atualizado
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        há 35 minutos
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-800 dark:text-gray-200">
                        Configuração alterada
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        há 1 hora
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection