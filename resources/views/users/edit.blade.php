@extends('layouts.app')

@section('title', 'Editar perfil | Gestión de Usuarios')
@section('page-heading', 'Mi Perfil')

@section('content')
    <div class="mb-5 flex items-center gap-4 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:mb-6 sm:p-6">
        <x-users.avatar :name="old('name', $user->name ?: 'Tu perfil')" size="h-16 w-16" class="ring-4 ring-blue-50" />
        <div class="min-w-0">
            <span class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Perfil de usuario</span>
            <h1 class="mt-1 truncate text-xl font-extrabold text-slate-900">{{ old('name', $user->name ?: 'Tu perfil') }}</h1>
            <p class="mt-0.5 truncate text-sm text-slate-500">{{ old('email', $user->email ?: 'Completa tus datos de contacto') }}</p>
            <span class="mt-2 inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-bold text-emerald-700">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                Cuenta activa
            </span>
        </div>
    </div>

    <form action="{{ url('/profile/edit') }}" method="POST" class="flex flex-col gap-5">
        @csrf
        @method('PUT')

        <section class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-700" aria-hidden="true">person</span>
                    <div>
                        <h2 class="font-extrabold text-slate-900">Datos personales</h2>
                        <p class="text-xs text-slate-500">Información básica de tu cuenta</p>
                    </div>
                </div>
                <span class="hidden text-xs font-semibold text-slate-400 sm:block">Información editable</span>
            </div>
            <div class="flex flex-col gap-4">
                <x-form.input name="name" label="Nombre completo" :value="$user->name" placeholder="Tu nombre completo" autocomplete="name" required />
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <x-form.input name="age" label="Edad" type="number" :value="$user->age" placeholder="Tu edad" min="18" max="99" />
                    <x-form.input name="phone" label="Teléfono" type="tel" :value="$user->phone" placeholder="+52 55 1234 5678" autocomplete="tel" />
                </div>
                <x-form.input name="curp" label="CURP (identificación oficial)" :value="$user->curp" placeholder="CURP" hint="18 caracteres" maxlength="18" />
                <x-form.input name="email" label="Correo electrónico" type="email" :value="$user->email" placeholder="nombre@empresa.com" autocomplete="email" required />
            </div>
        </section>

        <section class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center gap-3">
                <span class="material-symbols-outlined flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-700" aria-hidden="true">lock</span>
                <div>
                    <h2 class="font-extrabold text-slate-900">Credenciales y acceso</h2>
                    <p class="text-xs text-slate-500">Actualiza tu clave de acceso si lo necesitas</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <x-form.input name="username" label="Nombre de usuario" :value="$user->username ?? $user->name" placeholder="Nombre de usuario" autocomplete="username" />
                <x-form.input name="password" label="Nueva contraseña" type="password" placeholder="Dejar en blanco para conservarla" autocomplete="new-password" minlength="8" />
                <x-form.input name="password_confirmation" label="Confirmar nueva contraseña" type="password" placeholder="Repite la nueva contraseña" autocomplete="new-password" minlength="8" />
                <p class="-mt-2 text-xs text-slate-500">Por seguridad, nunca mostramos tu contraseña actual.</p>
            </div>
            @if ($user->updated_at)
                <div class="mt-5 flex items-center gap-3 rounded-xl bg-slate-50 px-4 py-3 text-xs text-slate-600">
                    <span class="material-symbols-outlined text-lg text-slate-500" aria-hidden="true">devices</span>
                    <span>Última actualización de perfil</span>
                    <span class="ml-auto font-bold">{{ $user->updated_at->translatedFormat('d M Y') }}</span>
                </div>
            @endif
        </section>

        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            <a href="{{ route('users.index') }}" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl px-4 py-2.5 text-sm font-bold text-slate-600 transition hover:bg-slate-100">
                <span class="material-symbols-outlined text-lg" aria-hidden="true">close</span>
                Descartar cambios
            </a>
            <x-ui.button type="submit">
                <span class="material-symbols-outlined text-lg" aria-hidden="true">save</span>
                Guardar cambios
            </x-ui.button>
        </div>
    </form>
@endsection
