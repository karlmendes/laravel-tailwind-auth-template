@extends('layouts.admin')

@section('title', 'Permissões')

@section('content')

    <x-admin.breadcrumb :items="[
        ['label' => 'Admin', 'url' => route('admin.dashboard')],
        ['label' => 'Permissões'],
    ]" />

    <div class="mb-6">
        <x-admin.page-title
            title="Permissões"
            description="Visualize as permissões disponíveis no sistema."
        />
    </div>

    <div class="mb-4 rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-sm text-blue-700 dark:border-blue-900 dark:bg-blue-950 dark:text-blue-300">
        As permissões são geradas pelo sistema através do <strong>PermissionSeeder</strong>.
        Para manter o starter padronizado, esta tela é apenas para consulta.
    </div>

    <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-950">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Permissão
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Módulo
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Guard
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Criada em
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                @forelse ($permissions as $permission)
                    @php
                        $module = explode('.', $permission->name)[0] ?? 'geral';
                    @endphp

                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                            {{ $permission->name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            <span class="inline-flex rounded-full bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                {{ ucfirst($module) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ $permission->guard_name }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ $permission->created_at?->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-500">
                            Nenhuma permissão encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $permissions->links() }}
    </div>

@endsection