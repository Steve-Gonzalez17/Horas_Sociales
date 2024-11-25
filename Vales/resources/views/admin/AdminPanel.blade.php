@include('components.scripts')
@extends('layouts.app')
@include('components.navbar')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - Administrador</title>
</head>

<body class="bg-[#30475e]">

    <div class="flex justify-center items-center w-full min-h-screen px-4">
        <div class="relative overflow-x-auto shadow-md rounded-lg w-full max-w-4xl">

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div
                class="flex items-center justify-between flex-wrap space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900 px-4 sm:px-6">
                <div class="flex ">
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center m-2"
                        type="button">
                        Nuevo usuario
                    </button>

                    @if(session('user') && optional(session('user'))->username === 'admin')
                        <a href="{{ url('/') }}">
                            <button type="button"
                                class="text-white bg-[#30475e] hover:bg-[#465f79] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 m-2">
                                Perspectiva General
                            </button>
                        </a>
                    @endif
                </div>

                <div class="w-full md:w-auto relative mt-2 md:mt-0">
                    <input type="text" id="table-search-users"
                        class="block w-full md:w-64 p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users">
                </div>
            </div>

            <table class="w-full text-sm text-left dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Nombre</th>
                        <th scope="col" class="px-4 py-3">Apellido</th>
                        <th scope="col" class="px-4 py-3">Username</th>
                        <th scope="col" class="px-4 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->lastname }}</td>
                            <td class="px-4 py-2">{{ $user->username }}</td>
                            <td class="px-4 py-2">
                                <button data-modal-target="crud-modal2" data-modal-toggle="crud-modal2"
                                    onclick="openEditModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->lastname }}', '{{ $user->username }}')"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Editar /
                                </button>

                                <form action="{{ route('delete.user', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!-- MODAL NUEVO USUARIO -->
  <div id="crud-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-50 w-full h-full bg-black bg-opacity-50  justify-center items-center p-4">
    <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800 w-full max-w-md p-6 mx-4">
        <div class="flex justify-between items-center pb-4 border-b dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Crear Nuevo Usuario</h3>
            <button data-modal-toggle="crud-modal" 
            class="flex items-center justify-center w-8 h-8 text-gray-500 bg-gray-100 rounded-full hover:bg-gray-200 hover:text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4" fill="currentColor">
                <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8-9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
            </svg>
            <span class="sr-only">Cerrar modal</span>
        </button>
        
        </div>
        <form class="mt-4" method="POST" action="{{ route('store.user') }}">
            @csrf
            <div class="grid gap-4 mb-4">
                <div>
                    <label for="name"
                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name"
                        placeholder="Ingrese un nombre"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    @error('name')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="lastname"
                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido:</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required
                        autocomplete="lastname" placeholder="Ingrese un apellido"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    @error('lastname')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username"
                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Username:</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required
                        autocomplete="username" placeholder="Ingrese un nombre de usuario"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    @error('username')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password"
                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña:</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        placeholder="Ingrese una contraseña"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    @error('password')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password-confirm"
                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Confirmar
                        Contraseña:</label>
                    <input type="password" id="password-confirm" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirme su contraseña"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>
            </div>
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-2 transition duration-200">
                Registrar usuario
            </button>
        </form>
    </div>
  </div>
  

    <!-- MODAL EDITAR USUARIO -->
    <div id="crud-modal2" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 right-0 left-0 z-50 w-full h-full bg-black bg-opacity-50  justify-center items-center p-4">
        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800 w-full max-w-md p-6 mx-4">
            <div class="flex justify-between items-center pb-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Editar Usuario</h3>
                <button data-modal-toggle="crud-modal2" 
                class="flex items-center justify-center w-8 h-8 text-gray-500 bg-gray-100 rounded-full hover:bg-gray-200 hover:text-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 h-4" fill="currentColor">
                    <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8-9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
                </svg>
                <span class="sr-only">Cerrar modal</span>
            </button>
            
            </div>
            <form class="mt-4" method="POST" action="{{ route('update.user') }}">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-user-id" name="id">
                <div class="grid gap-4 mb-4">
                    <div>
                        <label for="edit-name"
                            class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
                        <input type="text" id="edit-name" name="name" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for="edit-lastname"
                            class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido:</label>
                        <input type="text" id="edit-lastname" name="lastname" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for="edit-username"
                            class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Username:</label>
                        <input type="text" id="edit-username" name="username" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg py-2 transition duration-200">Actualizar
                    usuario</button>
            </form>
        </div>
      </div>
 

    <script>
        function openEditModal(id, name, lastname, username) {
            document.getElementById('edit-user-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-lastname').value = lastname;
            document.getElementById('edit-username').value = username;

        }

        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('table-search-users');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();

                tableRows.forEach(row => {
                    const cells = row.getElementsByTagName('td');
                    let rowContainsSearchTerm = false;

                    for (let cell of cells) {
                        if (cell.textContent.toLowerCase().includes(searchTerm)) {
                            rowContainsSearchTerm = true;
                            break;
                        }
                    }

                    if (rowContainsSearchTerm) {
                        row.style.display = ''; // Muestra la fila
                    } else {
                        row.style.display = 'none'; // Oculta la fila
                    }
                });
            });
        });

        /*MENSAJES DE ERROR Y SUCCES*/
        document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            const successMessage = document.querySelector('.bg-green-500');
            const errorMessage = document.querySelector('.bg-red-500');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000); // Cambia 5000 por el número de milisegundos que desees
    });
    </script>

</body>

</html>