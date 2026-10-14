@extends('layouts.app')

@section('title', 'Nuevo registro | Gestión de Usuarios')
@section('page-heading', 'Nuevo Registro')

@section('content')
    <div class="mb-5 rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:mb-6 sm:p-6">
        <div class="flex items-start justify-between gap-4">
            <div>
                <span class="mb-2 inline-flex items-center gap-2 rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-800">
                    <span class="h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                    Alta operativa
                </span>
                <h1 class="text-xl font-extrabold tracking-tight text-slate-900 sm:text-2xl">Registrar nuevo usuario</h1>
                <p class="mt-1 text-sm leading-6 text-slate-500">Completa los datos para dar de alta en la plataforma corporativa.</p>
            </div>
            <span class="material-symbols-outlined mt-1 flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-50 text-2xl text-blue-700" aria-hidden="true">badge</span>
        </div>
        <div class="mt-5 flex flex-wrap items-center justify-between gap-2 border-t border-slate-100 pt-4 text-xs font-semibold text-slate-500">
            <span>Paso 1 de 1: Formulario integral</span>
            <span class="inline-flex items-center gap-1 text-emerald-700">
                <span class="material-symbols-outlined text-base" aria-hidden="true">verified_user</span>
                Validación activa
            </span>
        </div>
    </div>

    <form action="{{ url('/register') }}" method="POST" class="flex flex-col gap-5">
        @csrf

        <section class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center gap-3">
                <span class="material-symbols-outlined flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-700" aria-hidden="true">person</span>
                <div>
                    <h2 class="font-extrabold text-slate-900">1. Datos personales</h2>
                    <p class="text-xs text-slate-500">Identidad oficial del colaborador</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <x-form.input name="name" label="Nombre completo" :value="old('name')" placeholder="Ej. Mariana Hernández Cruz" autocomplete="name" required />
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <x-form.input name="age" label="Edad" type="number" :value="old('age')" placeholder="Ej. 29" min="18" max="99" required />
                    <x-form.input name="phone" label="Teléfono" type="tel" :value="old('phone')" placeholder="+52 55 1234 5678" autocomplete="tel" required />
                </div>
                <x-form.input name="curp" label="CURP" :value="old('curp')" placeholder="Ej. HECM940512MDFRRN01" hint="18 caracteres alfanuméricos" maxlength="18" required />
                <x-form.input name="email" label="Correo electrónico" type="email" :value="old('email')" placeholder="nombre@empresa.com" autocomplete="email" required />
            </div>
        </section>

        <section class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center gap-3">
                <span class="material-symbols-outlined flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-700" aria-hidden="true">shield_person</span>
                <div>
                    <h2 class="font-extrabold text-slate-900">2. Rol en el sistema</h2>
                    <p class="text-xs text-slate-500">Determina permisos operativos y accesos</p>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                @php
                    $roles = [
                        ['vendedor_general', 'Vendedor general', 'Punto de venta y caja', 'point_of_sale'],
                        ['vendedor_papeleria', 'Vendedor papelería', 'Catálogos e insumos', 'menu_book'],
                        ['repartidor', 'Repartidor', 'Rutas y entregas activas', 'local_shipping'],
                        ['administrador', 'Administrador', 'Requiere autorización', 'admin_panel_settings'],
                    ];
                @endphp
                @foreach ($roles as [$value, $label, $description, $icon])
                    <label @class([
                        'flex cursor-pointer flex-col gap-3 rounded-xl border p-4 transition hover:border-blue-300 hover:bg-blue-50/50',
                        'border-blue-300 bg-blue-50/70 ring-1 ring-blue-200' => old('system_role', 'vendedor_papeleria') === $value,
                        'border-slate-200 bg-slate-50/70' => old('system_role', 'vendedor_papeleria') !== $value,
                    ])>
                        <span class="flex items-center justify-between">
                            <span class="material-symbols-outlined flex h-9 w-9 items-center justify-center rounded-full bg-white text-xl text-blue-700 shadow-sm" aria-hidden="true">{{ $icon }}</span>
                            <input type="radio" name="system_role" value="{{ $value }}" @checked(old('system_role', 'vendedor_papeleria') === $value) class="h-4 w-4 accent-blue-700" />
                        </span>
                        <span>
                            <span class="block text-sm font-extrabold text-slate-800">{{ $label }}</span>
                            <span class="mt-0.5 block text-xs font-medium text-slate-500">{{ $description }}</span>
                        </span>
                    </label>
                @endforeach
            </div>
            @error('system_role')
                <p class="mt-2 text-xs font-medium text-rose-600">{{ $message }}</p>
            @enderror
        </section>

        <section class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center gap-3">
                <span class="material-symbols-outlined flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-700" aria-hidden="true">lock</span>
                <div>
                    <h2 class="font-extrabold text-slate-900">3. Credenciales de acceso</h2>
                    <p class="text-xs text-slate-500">Identificador y clave de acceso</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <x-form.input name="username" label="Nombre de usuario" :value="old('username')" placeholder="m.hernandez" autocomplete="username" required />
                <x-form.input name="password" label="Contraseña temporal / inicial" type="password" placeholder="Mínimo 8 caracteres" autocomplete="new-password" minlength="8" required />
                <x-form.input name="password_confirmation" label="Confirmar contraseña" type="password" placeholder="Repite la contraseña" autocomplete="new-password" minlength="8" required />
                <p class="-mt-2 text-xs text-slate-500">Usa al menos 8 caracteres, una mayúscula y un símbolo.</p>
            </div>
        </section>

        <section class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm sm:p-6">
            <div class="mb-5 flex items-center gap-3">
                <span class="material-symbols-outlined flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-50 text-xl text-indigo-700" aria-hidden="true">tune</span>
                <div>
                    <h2 class="font-extrabold text-slate-900">4. Configuración y estatus</h2>
                    <p class="text-xs text-slate-500">Disponibilidad en nómina y sistema</p>
                </div>
            </div>
            <label class="flex cursor-pointer items-center justify-between gap-4 rounded-xl bg-slate-50 p-4">
                <span>
                    <span class="block text-sm font-extrabold text-slate-800">Estado de la cuenta</span>
                    <span class="mt-1 block text-xs text-slate-500">El usuario podrá ingresar de inmediato</span>
                </span>
                <input type="checkbox" name="active" value="1" @checked(old('active', true)) class="h-5 w-5 rounded accent-blue-700" />
            </label>
            <div class="mt-4 flex items-center gap-3 rounded-xl bg-slate-50 px-4 py-3 text-sm text-slate-600">
                <span class="material-symbols-outlined text-xl text-slate-500" aria-hidden="true">event_available</span>
                <span>Fecha de creación en plataforma</span>
                <span class="ml-auto text-xs font-semibold text-slate-500">{{ now()->translatedFormat('d M Y') }}</span>
                <span class="material-symbols-outlined text-base text-slate-400" aria-hidden="true">lock</span>
            </div>
            <p class="mt-4 flex items-start gap-2 rounded-xl bg-indigo-50/70 p-3 text-xs leading-5 text-indigo-900">
                <span class="material-symbols-outlined text-lg text-blue-700" aria-hidden="true">info</span>
                Se enviará un correo con el enlace de validación y las credenciales provisionales al colaborador.
            </p>
        </section>

        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            <a href="{{ route('users.index') }}" class="inline-flex min-h-11 items-center justify-center rounded-xl px-4 py-2.5 text-sm font-bold text-slate-600 transition hover:bg-slate-100">Cancelar</a>
            <x-ui.button type="submit">
                <span class="material-symbols-outlined text-lg" aria-hidden="true">person_add</span>
                Crear usuario
            </x-ui.button>
        </div>
    </form>
@endsection
