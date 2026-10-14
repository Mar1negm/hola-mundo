@props(['user'])

<article class="rounded-2xl border border-slate-100 bg-white p-4 shadow-sm transition hover:shadow-md sm:p-5">
    <div class="flex items-start gap-3">
        <x-users.avatar :name="$user->name" />
        <div class="min-w-0 flex-1">
            <div class="flex flex-wrap items-start justify-between gap-2">
                <div class="min-w-0">
                    <h3 class="truncate text-sm font-extrabold text-slate-900">{{ $user->name }}</h3>
                    <p class="mt-0.5 text-xs font-medium text-slate-500">ID {{ str_pad((string) $user->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>
                <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2.5 py-1 text-[11px] font-bold text-blue-700">
                    {{ $user->email_verified_at ? 'Verificado' : 'Pendiente' }}
                </span>
            </div>
            <p class="mt-3 truncate text-sm text-slate-600">{{ $user->email }}</p>
            <div class="mt-3 flex items-center justify-between gap-2 border-t border-slate-100 pt-3">
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500">
                    <span class="material-symbols-outlined text-base" aria-hidden="true">calendar_today</span>
                    {{ $user->created_at?->translatedFormat('d M Y') ?? 'Fecha no disponible' }}
                </span>
                <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[11px] font-bold text-emerald-700">Usuario</span>
            </div>
        </div>
    </div>
</article>
