@extends('layouts.admin')

@section('title', 'Editar grupo')

@section('content')

    <x-admin.breadcrumb :items="[
            ['label' => 'Admin', 'url' => route('admin.dashboard')],
            ['label' => 'Grupos', 'url' => route('admin.roles.index')],
            ['label' => 'Editar grupo'],
        ]" />

    <x-admin.page-title title="Editar grupo" description="Altere o grupo e suas permissões." />

    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-950">
        <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nome do grupo
                </label>

                <input type="text" name="name" value="{{ old('name', $role->name) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                @php
                    $permissionLabels = config('permissions');
                @endphp

                <div>
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Acessos do grupo
                            </label>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Selecione quais telas este grupo poderá acessar.
                            </p>
                        </div>

                        <div class="flex gap-2">
                            <button type="button"
                                onclick="document.querySelectorAll('.permission-checkbox').forEach(el => el.checked = true)"
                                class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                                Selecionar tudo
                            </button>

                            <button type="button"
                                onclick="document.querySelectorAll('.permission-checkbox').forEach(el => el.checked = false)"
                                class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:hover:bg-gray-800">
                                Limpar
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                        @foreach ($permissions->flatten() as $permission)
                            @php
                                $label = $permissionLabels[$permission->name] ?? [
                                    'title' => ucfirst(str_replace(['.', '_', '-'], ' ', $permission->name)),
                                    'description' => 'Permissão de acesso ao módulo.',
                                ];
                            @endphp

                            <label
                                class="group flex cursor-pointer gap-4 rounded-2xl border border-gray-200 bg-white p-4 transition hover:border-blue-300 hover:bg-blue-50 dark:border-gray-800 dark:bg-gray-950 dark:hover:border-blue-800 dark:hover:bg-blue-950/30">
                                <input type="checkbox"
                                    class="permission-checkbox mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                    name="permissions[]" value="{{ $permission->name }}" @checked(in_array($permission->name, old('permissions', $rolePermissions)))>

                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ $label['title'] }}
                                        </span>

                                        <span
                                            class="rounded-full bg-gray-100 px-2 py-0.5 text-xs text-gray-500 dark:bg-gray-800 dark:text-gray-400">
                                            {{ $permission->name }}
                                        </span>
                                    </div>

                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                        {{ $label['description'] }}
                                    </p>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    @error('permissions')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                @error('permissions')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.roles.index') }}"
                    class="rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800">
                    Cancelar
                </a>

                <button type="submit"
                    class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                    Atualizar
                </button>
            </div>
        </form>
    </div>

@endsection