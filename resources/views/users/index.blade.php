@extends('layouts.app')

@section('title', 'Catálogo de Usuarios | Gestión de Usuarios')
@section('page-heading', 'Directorio de Usuarios')

@section('content')
    <div class="mb-5 flex flex-wrap items-end justify-between gap-3 sm:mb-6">
        <div>
            <p class="text-xs font-bold uppercase tracking-[0.12em] text-slate-500">Administración</p>
            <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Catálogo de personal</h1>
            <p class="mt-1 text-sm text-slate-500">
                <span class="mr-1 inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
                {{ $users->total() }} usuarios registrados
            </p>
        </div>
        <a href="{{ route('register') }}" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-xl bg-blue-700 px-4 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-200">
            <span class="material-symbols-outlined text-lg" aria-hidden="true">person_add</span>
            Nuevo usuario
        </a>
    </div>

    <section class="mb-4 rounded-2xl border border-slate-100 bg-white p-4 shadow-sm sm:p-5">
        <form action="{{ route('users.index') }}" method="GET" class="relative">
            <label for="user-search" class="sr-only">Buscar por nombre o correo</label>
            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-xl text-slate-400" aria-hidden="true">search</span>
            <input id="user-search" name="search" type="search" value="{{ $search }}" placeholder="Buscar por nombre o correo..." class="h-12 w-full rounded-xl border border-slate-200 bg-slate-50 pl-11 pr-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100">
        </form>
    </section>

    <div class="mb-3 flex items-center justify-between gap-2">
        <h2 class="text-sm font-extrabold text-slate-800">Usuarios</h2>
        <span class="text-xs font-medium text-slate-500">Mostrando {{ $users->count() }} de {{ $users->total() }}</span>
    </div>

    @if ($users->isEmpty())
        <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-5 py-12 text-center">
            <span class="material-symbols-outlined text-4xl text-slate-300" aria-hidden="true">group_off</span>
            <h2 class="mt-3 font-extrabold text-slate-800">{{ $search ? 'No se encontraron usuarios' : 'Aún no hay usuarios' }}</h2>
            <p class="mt-1 text-sm text-slate-500">
                {{ $search ? 'Prueba con otro nombre o correo electrónico.' : 'Registra el primer perfil para iniciar el catálogo.' }}
            </p>
            @if (! $search)
                <a href="{{ route('register') }}" class="mt-4 inline-flex text-sm font-bold text-blue-700 hover:text-blue-900">Registrar usuario</a>
            @endif
        </div>
    @else
        <div class="flex flex-col gap-3">
            @foreach ($users as $user)
                <x-users.card :user="$user" />
            @endforeach
        </div>

        <div class="mt-5">
            {{ $users->links() }}
        </div>
    @endif
@endsection
