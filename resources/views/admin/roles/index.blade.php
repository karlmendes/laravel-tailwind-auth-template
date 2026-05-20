@extends('layouts.admin')

@section('title', 'Grupos')

@section('content')

    <x-admin.breadcrumb :items="[
            ['label' => 'Admin', 'url' => route('admin.dashboard')],
            ['label' => 'Grupos'],
        ]" />

    <div class="mb-6 flex items-center justify-between">
        <x-admin.page-title title="Grupos" description="Gerencie os grupos de acesso do sistema." />

        <a href="{{ route('admin.roles.create') }}"
            class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
            Novo grupo
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <div
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-gray-950">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Nome
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Usuários
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                        Permissões
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">
                        Ações
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                @forelse ($roles as $role)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">
                            {{ $role->name }}
                        </td>
                        
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ $role->users_count }} usuários
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                            {{ $role->permissions_count }} permissões
                        </td>

                        <td class="px-6 py-4 text-right text-sm">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.roles.edit', $role) }}"
                                    class="rounded-lg border border-gray-200 px-3 py-1.5 text-gray-600 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('admin.roles.destroy', $role) }}"
                                    onsubmit="return confirm('Deseja realmente excluir este grupo?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="rounded-lg border border-red-200 px-3 py-1.5 text-red-600 hover:bg-red-50 dark:border-red-900 dark:hover:bg-red-950">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-sm text-gray-500">
                            Nenhum grupo encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $roles->links() }}
    </div>

@endsection