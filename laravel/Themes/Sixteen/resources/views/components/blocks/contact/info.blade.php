@props(['title' => 'Contatti', 'office' => '', 'phone' => '', 'email' => '', 'hours' => '', 'address' => ''])
<section class="py-10 bg-slate-50">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-2xl font-semibold text-slate-900">{{ $title }}</h2>
            <dl class="mt-6 grid gap-4 md:grid-cols-2">
                @foreach([
                    'Ufficio' => $office,
                    'Telefono' => $phone,
                    'Email' => $email,
                    'Orari' => $hours,
                    'Indirizzo' => $address,
                ] as $label => $value)
                    @if($value)
                        <div>
                            <dt class="text-sm font-semibold uppercase tracking-wide text-slate-500">{{ $label }}</dt>
                            <dd class="mt-1 text-slate-800">{{ $value }}</dd>
                        </div>
                    @endif
                @endforeach
            </dl>
        </div>
    </div>
</section>
