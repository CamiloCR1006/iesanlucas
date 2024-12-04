<div class="md:px-20 md:py-4 px-3 bg-[#b6d7a8]">
    <div class="py-10">
        <h1 class="text-center font-inst font-bold" style="font-size: 30px;">
            Planes de area
        </h1>
        <div>
            <div class="mt-5">
                @php
                    $subjects = \App\Models\Subject::get();
                @endphp
                <h1 class="font-semibold mb-4" style="font-size: 20px;">
                    Primaria
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-5 px-4">

                    @foreach ($subjects as $key => $subject)
                        <div class="border border-white p-5 rounded-lg bg-white">
                            <p class="text-center font-semibold">{{ $subject->name }}</p>
                            @foreach (config('settings.subcategory.primary') as $grade_key => $grade)
                                @php
                                    $query = \App\Models\Plan::query()
                                        ->where('category', 'primary')
                                        ->where('subject', $subject->id)
                                        ->where('subcategory', $grade_key);
                                    $plan_primary = $query->get();
                                @endphp
                                <p class="italic font-semibold">
                                    {{ $grade }}
                                </p>
                                <p class="pl-5">
                                    @foreach ($plan_primary as $plan)
                                        • <a target="_blank" href="{{ asset("storage/{$plan->file}") }}"
                                            class="underline">{{ $plan->name }}</a>
                                    @endforeach
                                </p>
                            @endforeach
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="mt-5">
                <h1 class="font-semibold mb-4" style="font-size: 20px;">
                    Secundaria
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-5 px-4">

                    @foreach ($subjects as $key => $subject)
                        <div class="border border-white p-5 rounded-lg bg-white">
                            <p class="text-center font-semibold">{{ $subject->name }}</p>
                            @foreach (config('settings.subcategory.secondary') as $grade_key => $grade)
                                @php
                                    $query = \App\Models\Plan::query()
                                        ->where('category', 'secondary')
                                        ->where('subject', $subject->id)
                                        ->where('subcategory', $grade_key);
                                    $plan_primary = $query->get();
                                @endphp
                                <p class="italic font-semibold">
                                    {{ $grade }}
                                </p>
                                <p class="pl-5">
                                    @foreach ($plan_primary as $plan)
                                        • <a target="_blank" href="{{ asset("storage/{$plan->file}") }}"
                                            class="underline">{{ $plan->name }}</a>
                                    @endforeach
                                </p>
                            @endforeach
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
