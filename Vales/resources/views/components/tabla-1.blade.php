<div>
    <h2 class="text-center text-white font-bold mb-[1.6rem] mt-[0.8rem] text-[1.2rem]">
        Entrega de vales para combustible (Disel o gasolina)
    </h2>

    <div class="mb-2">
        <hr />
    </div>
    <form class="p-4 md:p-5" action="{{ route('entregavales.store') }}" method="POST">
        @csrf
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-3">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Numero Solicitud</span>
                    </div>
                    <input type="text" name="numero_solicitud" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>

            <div x-data="{ open: false, seleccion: '', opciones: ['NORMAL', 'SEMANA SANTA', 'FIESTAS AGOSTINAS', 'FIN DE AÑO', 'FINLANDESA'] }"
                class="form-control w-full text-black">
                <div class="label">
                    <span class="label-text text-white">PROGRAMA</span>
                </div>
                <div class="relative">
                    <!-- Campo de entrada -->
                    <input type="text" x-model="seleccion" name="programa"
                        placeholder="Selecciona o ingresa un programa" @focus="open = true" @input="open = true"
                        @blur="setTimeout(() => open = false, 150)"
                        class="bg-gray-50 text-black border border-gray-300 rounded-lg w-full px-4 py-2 pr-10 focus:outline-none" />
                    <!-- Flecha personalizada -->
                    <button type="button" @click="open = !open"
                        class="absolute inset-y-0 right-0 flex items-center px-2">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Menú desplegable de opciones -->
                    <ul x-show="open"
                        class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg shadow-lg max-h-48 overflow-y-auto">
                        <template x-for="opcion in opciones" :key="opcion">
                            <li @click="seleccion = opcion; open = false"
                                class="px-4 py-2 cursor-pointer hover:bg-blue-100">
                                <span x-text="opcion"></span>
                            </li>
                        </template>
                    </ul>
                </div>

            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Suministra</span>
                    </div>
                    <select name="suministra" class="bg-white text-black border-gray-300 select select-bordered w-full">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-3">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Solicita</span>
                    </div>
                    <input type="text" name="solicita" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Depto Solicita</span>
                    </div>
                    <input type="text" name="depto_solicita" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>
            <div x-data="{ open: false, seleccion: '', opciones: ['TESORERIA', 'RECURSOS PROPIOS', 'PROYECTO', 'DONACION', 'FONDO GOES'] }"
                class="form-control w-full text-black">
                <div class="label">
                    <span class="label-text text-white">Tipo de Fondo</span>
                </div>
                <div class="relative">
                    <!-- Campo de entrada -->
                    <input type="text" x-model="seleccion" name="tipo_fondo"
                        placeholder="Selecciona o ingresa tipo de fondo" @focus="open = true" @input="open = true"
                        @blur="setTimeout(() => open = false, 150)"
                        class="bg-gray-50 text-black border border-gray-300 rounded-lg w-full px-4 py-2 pr-10 focus:outline-none" />
                    <!-- Flecha personalizada -->
                    <button type="button" @click="open = !open"
                        class="absolute inset-y-0 right-0 flex items-center px-2">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Menú desplegable de opciones -->
                    <ul x-show="open"
                        class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg shadow-lg max-h-48 overflow-y-auto">
                        <template x-for="opcion in opciones" :key="opcion">
                            <li @click="seleccion = opcion; open = false"
                                class="px-4 py-2 cursor-pointer hover:bg-blue-100">
                                <span x-text="opcion"></span>
                            </li>
                        </template>
                    </ul>
                </div>
                <!-- @error('tipo_fondo')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror -->
            </div>


        </div>
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-3">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Destino</span>
                    </div>
                    <input type="text" name="destino" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>

            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Departamento</span>
                    </div>
                    <select name="departamento"
                        class="bg-white text-black border-gray-300 select select-bordered w-full">
                        <option value="">Seleccione un departamento</option>
                        <option value="ahuachapan">Ahuachapán</option>
                        <option value="santa_ana">Santa Ana</option>
                        <option value="sonsonate">Sonsonate</option>
                        <option value="chalatenango">Chalatenango</option>
                        <option value="la_libertad">La Libertad</option>
                        <option value="san_salvador">San Salvador</option>
                        <option value="cuscatlan">Cuscatlán</option>
                        <option value="la_paz">La Paz</option>
                        <option value="cabanas">Cabañas</option>
                        <option value="san_vicente">San Vicente</option>
                        <option value="usulutan">Usulután</option>
                        <option value="san_miguel">San Miguel</option>
                        <option value="morazan">Morazán</option>
                        <option value="la_union">La Unión</option>
                    </select>
                </label>
            </div>
            <div>
                <label class="form-control w-full ">
                    <div class="label ">
                        <span class="label-text  text-white">Mision</span>
                    </div>
                    <textarea name="mision"
                        class="textarea text-black bg-gray-50 border border-gray-300 input input-bordered w-full"
                        placeholder="Bio"></textarea>
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Proyecto</span>
                    </div>
                    <input type="text" name="proyecto" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Autoriza</span>
                    </div>
                    <input type="text" name="autoriza" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />


                </label>
            </div>
            <div class="flex w-full mb-2">
                <label class="form-control w-full flex-grow mr-4">
                    <div class="label flex-grow">
                        <span class="label-text text-white">Combustible:</span>
                    </div>
                    <select type="text" name="combustible" placeholder="Type here"
                        class="text-black bg-white  border-gray-300 select select-bordered w-full ">
                        <option>DIESEL</option>
                        <option>GASOLINA</option>
                    </select>
                </label>
            </div>


        </div>

        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Fecha reserva</span>
                    </div>

                    <input type="date" name="fecha_reserva"
                        class="bg-[#7b7f85] border-white text-white input input-bordered w-full" />
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Fecha Vence</span>
                    </div>

                    <input type="date" name="fecha_vence"
                        class="bg-[#7b7f85] border-white text-white input input-bordered w-full" />
                </label>
            </div>

        </div>
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-1">

        </div>
        <div class="mb-4">
            <hr />
        </div>
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Conversión</span>
                    </div>
                    <input type="text" name="conversion" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Total de Galones por vale</span>
                    </div>
                    <input type="text" name="cantidad_combustible" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />


                </label>
            </div>
        </div>
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-1">
            <div class="flex w-full mb-2">
                <label class="form-control w-full flex-grow mr-4">
                    <div class="label flex-grow">
                        <span class="label-text text-white">Serie:</span>
                    </div>
                    <select type="text" name="serie" placeholder="Type here"
                        class="text-black bg-white  border-gray-300 select select-bordered w-full ">
                        <option>*</option>
                        <option>*</option>
                        <option>*</option>
                        <option>*</option>
                        <option>*</option>
                    </select>
                </label>
                <label class="form-control flex-grow">
                    <div class="label flex-grow">
                        <span class="label-text flex-grow text-white">No. Requisición</span>
                    </div>
                    <input type="number" name="no_requisicion" placeholder="Type here"
                        class="text-black bg-gray-50 border border-gray-300 input input-bordered flex-grow" />
                </label>
            </div>
        </div>

        <div class="mb-4">
            <hr />
        </div>
        <div class=" text-white text-center font-bold mb-4">Precios de referencia</div>
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">De Compra</span>
                    </div>
                    <input type="text" name="precio_compra" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Actual</span>
                    </div>
                    <input type="text" name="precio_actual" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />


                </label>
            </div>
        </div>

        <div class="mb-4">
            <hr />
        </div>
        <div class=" text-white text-center font-bold mb-4">Cantidad de VALES</div>
        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-2">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Autorizados</span>
                    </div>
                    <input type="text" name="autorizados" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Digitados</span>
                    </div>
                    <input type="text" name="digitados" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />


                </label>
            </div>
        </div>
        <div class="mb-4">
            <hr />
        </div>

        <div class="grid gap-6 mb-6 grid-cols-1 md:grid-cols-1">
            <div>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-white">Serie de Vale</span>
                    </div>
                    <input type="text" name="serie_vale" placeholder="Type here"
                        class="text-black bg-gray-50 border-gray-300 input input-bordered w-full" />
                </label>
            </div>
        </div>
        <!-- Additional inputs -->
        <div class="w-full flex items-center justify-center">
            <button type="submit"
                class="btn-block text-white border border-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 transition-colors duration-300 ease-in-out  hover:text-black hover:bg-white focus:ring-4 focus:outline-none focus:ring-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-white dark:focus:ring-white text-[1.2rem]">
                Generar
            </button>
        </div>
    </form>
    <br>
    <div class="mb-2">
        <hr />
    </div>
    <div class="overflow-x-auto max-w-full" style="max-height: 300px;">
        <table class="w-full text-sm text-left text-gray-500" id="entregavales-table">
            <thead class="text-xs text-black bg-gray-50">
                <tr>
                    <th class="px-6 py-3 border border-black text-center">N°Solicitud</th>
                    <th class="px-6 py-3 border border-black text-center">Programa</th>
                    <th class="px-6 py-3 border border-black text-center">Suministra</th>
                    <th class="px-6 py-3 border border-black text-center">Solicita</th>
                    <th class="px-6 py-3 border border-black text-center">Depto_Solitica</th>
                    <th class="px-6 py-3 border border-black text-center">Tipo de Fondo</th>
                    <th class="px-6 py-3 border border-black text-center">Destino</th>
                    <th class="px-6 py-3 border border-black text-center">Derpatamento</th>
                    <th class="px-6 py-3 border border-black text-center">Mision</th>
                    <th class="px-6 py-3 border border-black text-center">Proyecto</th>
                    <th class="px-6 py-3 border border-black text-center">Autoriza</th>
                    <th class="px-6 py-3 border border-black text-center">Combustible</th>
                    <th class="px-6 py-3 border border-black text-center">Fecha reserva</th>
                    <th class="px-6 py-3 border border-black text-center">Fecha vence</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script>
    // Obtener los entregavales cuando cargue la página
    window.onload = function () {
        fetch('/entregavales/list')  // Ruta para obtener los entregavales
            .then(response => response.json())
            .then(data => {
                let tableBody = document.querySelector('#entregavales-table tbody');
                data.forEach(entregavale => {
                    let row = `<tr class="bg-white border-b">
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.numero_solicitud}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.programa}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.suministra}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.solicita}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.depto_solicita}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.tipo_fondo}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.destino}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.departamento}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.mision}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.proyecto}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.autoriza}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.combustible}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.fecha_reserva}</td>
                            <td class="px-6 py-4 border border-black text-black text-center">${entregavale.fecha_vence}</td>
                        </tr>`;
                    tableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error al obtener los entregavales:', error));
    }
</script>