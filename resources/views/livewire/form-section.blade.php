<div class="px-4 flex justify-center w-full py-10">
    <div class="bg-[#b6d7a8] md:max-w-[50%] w-full h-auto rounded-md px-10 py-8">
        <form class="mx-auto ">
            <label for="name" class="block mb-2 font-bold">Nombre</label>
            <input required wire:model="name" type="text"
                class="mb-8 w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500"
                placeholder="Ingresa tu nombre">
            <label for="message" class="font-bold block mb-2">Mensaje</label>
            <textarea required wire:model="message" name="message" id="" cols="30" rows="10"
                class="w-full rounded-md focus:border-[#b6d7a8] focus:ring-[#b6d7a8] text-gray-500 p-3"
                placeholder="Ingresa tu mensaje"></textarea>
        </form>
        <button wire:click="send" type="submit"
            class="mt-4 w-full border border-[#27584d] p-1 bg-[#27584d] text-white button-enviar rounded-md">Enviar</button>
    </div>

    <script>
        document.addEventListener('message-sent', function() {
            Swal.fire({
                title: "Mensaje enviado",
                text: "Gracias por tu mensaje",
                icon: "success",
                confirmButtonColor: "#b6d7a8",
            });
        });

        document.addEventListener('name-error', function() {
            Swal.fire({
                title: "Error",
                text: "Ingresa un nombre valido",
                icon: "error",
                confirmButtonColor: "#b6d7a8",
            });
        });

        document.addEventListener('message-error', function() {
            Swal.fire({
                title: "Error",
                text: "Ingresa un mensaje valido",
                icon: "error",
                confirmButtonColor: "#b6d7a8",
            });
        });
    </script>
</div>
