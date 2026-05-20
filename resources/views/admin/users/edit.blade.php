@extends('layouts.admin')

@section('title', 'Editar usuário')

@section('content')

    <x-admin.breadcrumb :items="[
        ['label' => 'Admin', 'url' => route('admin.dashboard')],
        ['label' => 'Usuários', 'url' => route('admin.users.index')],
        ['label' => 'Editar usuário'],
    ]" />

    <x-admin.page-title
        title="Editar usuário"
        description="Altere os dados e grupos do usuário."
    />

    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-950">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nome
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    E-mail
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">

                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nova senha
                    </label>

                    <input type="password"
                           name="password"
                           class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">

                    <p class="mt-1 text-xs text-gray-500">
                        Deixe em branco para manter a senha atual.
                    </p>

                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Confirmar nova senha
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                </div>
            </div>

            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Grupos
                </label>

                <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                    @forelse ($roles as $role)
                        <label class="flex items-center gap-2 rounded-lg border border-gray-200 px-4 py-3 text-sm dark:border-gray-700">
                            <input type="checkbox"
                                   name="roles[]"
                                   value="{{ $role->name }}"
                                   @checked(in_array($role->name, old('roles', $userRoles)))>

                            <span class="text-gray-700 dark:text-gray-300">
                                {{ $role->name }}
                            </span>
                        </label>
                    @empty
                        <p class="text-sm text-gray-500">
                            Nenhum grupo cadastrado.
                        </p>
                    @endforelse
                </div>

                @error('roles')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}"
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