<div>
    <div class="px-4 flex justify-center w-full py-10">
        <div class="bg-[#b6d7a8] md:max-w-[50%] w-full h-auto rounded-md px-10 py-8">
            <form class="mx-auto">
                <!-- Nombre completo -->
                <label for="name" class="block mb-2 font-bold">Nombre completo</label>
                <input required wire:model="name" type="text"
                    class="mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500"
                    placeholder="Ingresa tu nombre">

                <!-- Selector -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="level_of_study" class="block mb-2 font-bold">Nivel de estudio</label>
                        <select required wire:model.live="level_of_study"
                            class="p-2 mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500">
                            <option value="null">Selecciona una opción</option>
                            @foreach (config('settings.levels_of_study') as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="year" class="block mb-2 font-bold">Año de graduación</label>
                        <input required wire:model="year" type="numeric" maxlength="4"
                            oninput ="this.value = this.value.replace(/[^0-9]/g, '')",
                            class="p-2 mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500"
                            placeholder="Ingresa el año de graduación">
                    </div>

                </div>

                @if ($level_of_study == 'undergraduate' || in_array($level_of_study, ['doctorate', 'master', 'specialization']))
                    <label for="name" class="block mb-2 font-bold">Programa Académico (Carrera)</label>
                    <input required wire:model="undergraduate" type="text"
                        class="mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500"
                        placeholder="Ingresa el nombre de la carrera">
                @endif

                @if (in_array($level_of_study, ['doctorate', 'master', 'specialization']))
                    <label for="postgraduate" class="block mb-2 font-bold">Estudios Especializados o Posgrado</label>
                    <input required wire:model="postgraduate" type="text"
                        class="mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500"
                        placeholder="Ingresa el nombre del estudio">
                @endif

                <label for="phone_number" class="block mb-2 font-bold">Número de celular</label>
                <input required wire:model="phone_number" type="numeric"
                    oninput ="this.value = this.value.replace(/[^0-9]/g, '')",
                    class="p-2 mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500"
                    placeholder="Ingresa tu número de celular">

                <label for="email" class="block mb-2 font-bold">Correo electrónico</label>
                <input required wire:model="email" type="email"
                    class="p-2 mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500"
                    placeholder="Ingresa tu número de celular">

                <!-- Radio Buttons -->
                <label class="block mb-2 "><span class="font-bold">¿Desea ser incluido en el envío de notificaciones de
                        egresados vía WhatsApp o Redes Sociales?</span>
                    <p>
                        Tenga en cuenta que solo será enviada exclusivamente información relacionada con egresados de la
                        institución. Al contestar "SI ACEPTO" usted autoriza a la Institución Educativa San Lucas a usar
                        su información de contacto para enviar información exclusivamente relacionada con iniciativas o
                        eventos que vinculen egresados de la Institución.</p>
                </label>
                <div class="mb-8 flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                        <input required wire:model="permision" type="radio" value=1
                            class="text-[#27584d] focus:ring-[#b6d7a8]">
                        <span class="text-black">Si acepto</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input required wire:model="permision" type="radio" value=0
                            class="text-[#27584d] focus:ring-[#b6d7a8]">
                        <span class="text-black">No acepto</span>
                    </label>
                </div>
            </form>

            <!-- Botón de envío -->
            <button wire:click="send" type="submit"
                class="mt-4 w-full border border-[#27584d] p-1 bg-[#27584d] text-white button-enviar rounded-md">Enviar</button>
        </div>

        <!-- Scripts para notificaciones -->
        <script>
            document.addEventListener('success', function() {
                Swal.fire({
                    title: "Registro exitoso",
                    text: "Gracias por tu tiempo",
                    icon: "success",
                    confirmButtonColor: "#b6d7a8",
                });
            });

            document.addEventListener('error', function() {
                Swal.fire({
                    title: "Error",
                    text: "Ingresa todos los campos por favor",
                    icon: "error",
                    confirmButtonColor: "#b6d7a8",
                });
            });

        </script>
    </div>
</div>
