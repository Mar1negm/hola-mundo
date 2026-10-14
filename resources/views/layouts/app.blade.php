<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7f8fc">
    <title>@yield('title', 'Gestión de Usuarios')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">
    <header class="sticky top-0 z-40 border-b border-slate-100 bg-white/90 shadow-[0_1px_8px_rgba(15,23,42,0.04)] backdrop-blur-xl">
        <div class="mx-auto flex h-16 max-w-5xl items-center justify-between px-4 sm:px-6">
            <a href="{{ route('users.index') }}" class="flex min-w-0 items-center gap-3">
                <img src="https://placehold.co/144x144/1d4ed8/ffffff?text=GU" alt="Gestión de Usuarios" class="h-9 w-9 shrink-0 rounded-xl object-cover">
                <span class="min-w-0">
                    <span class="block text-xs font-semibold leading-tight text-slate-500">Admin Portal</span>
                    <span class="block truncate text-sm font-extrabold leading-tight text-slate-900">@yield('page-heading', 'Gestión de Usuarios')</span>
                </span>
            </a>
            <div class="flex items-center gap-2">
                <button type="button" aria-label="Notificaciones" class="flex h-10 w-10 items-center justify-center rounded-full text-slate-500 transition hover:bg-slate-100 hover:text-slate-800">
                    <span class="material-symbols-outlined text-[22px]" aria-hidden="true">notifications</span>
                </button>
                <a href="{{ route('profile.edit') }}" aria-label="Editar perfil">
                    <img src="https://i.pravatar.cc/100?img=12" alt="Avatar del administrador" class="h-9 w-9 rounded-full border-2 border-white object-cover shadow-sm">
                </a>
            </div>
        </div>
    </header>

    <main class="mx-auto min-h-[calc(100vh-8rem)] max-w-5xl px-4 pb-28 pt-5 sm:px-6 sm:pt-8">
        @yield('content')
    </main>

    <nav aria-label="Navegación principal" class="fixed inset-x-0 bottom-0 z-40 border-t border-slate-100 bg-white/95 pb-[env(safe-area-inset-bottom)] shadow-[0_-2px_12px_rgba(15,23,42,0.05)] backdrop-blur-xl">
        <div class="mx-auto flex h-16 max-w-5xl items-center justify-around px-2">
            <a href="{{ route('users.index') }}" @class([
                'flex min-h-12 min-w-16 flex-col items-center justify-center gap-0.5 rounded-xl px-3 text-xs font-bold transition',
                'text-blue-700' => request()->routeIs('users.index'),
                'text-slate-500 hover:text-slate-800' => ! request()->routeIs('users.index'),
            ])>
                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">group</span>
                <span>Usuarios</span>
            </a>
            <a href="{{ route('register') }}" @class([
                'flex min-h-12 min-w-16 flex-col items-center justify-center gap-0.5 rounded-xl px-3 text-xs font-bold transition',
                'text-blue-700' => request()->routeIs('register'),
                'text-slate-500 hover:text-slate-800' => ! request()->routeIs('register'),
            ])>
                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">person_add</span>
                <span>Registro</span>
            </a>
            <a href="{{ route('profile.edit') }}" @class([
                'flex min-h-12 min-w-16 flex-col items-center justify-center gap-0.5 rounded-xl px-3 text-xs font-bold transition',
                'text-blue-700' => request()->routeIs('profile.*'),
                'text-slate-500 hover:text-slate-800' => ! request()->routeIs('profile.*'),
            ])>
                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">account_circle</span>
                <span>Mi perfil</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="flex min-h-12 min-w-16 flex-col items-center justify-center gap-0.5 rounded-xl px-3 text-xs font-bold text-slate-500 transition hover:text-slate-800">
                <span class="material-symbols-outlined text-[22px]" aria-hidden="true">settings</span>
                <span>Ajustes</span>
            </a>
        </div>
    </nav>
</body>
</html>
