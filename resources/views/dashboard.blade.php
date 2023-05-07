<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-xl font-semibold">TO DO LIST</h1>


                    <fieldset class="border p-2 mb-2 border-pink-500 rounded">
                        <legend class="text-xl px-2 border rounded-md border-violet-700">Make News Tasks</legend>

                        <form action="{{ route('task.store') }}" method="POST" class="mt-2">
                            @csrf

                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full " type="text" name="description" required />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="expiration" :value="__('Expiration')" />
                                <x-text-input id="expiration" class="block mt-1 w-full" type="text" name="expiration" required />
                            </div>
                            <br>
                            <x-primary-button class="w-full bg-rose-600"> Add </x-primary-button>
                        </form>
                    </fieldset>

                    <br>
                    @foreach (Auth::user()->myTasks as $task)

                    <div class="flex justify-between border-b mb-2 gap-4
                    hover:bg-pink-200" x-data=" { showDelete: false, showEdit: false  } ">

                        <div class="flex justify-between flex-grow">
                            <div>Description: {{ $task -> description }} </div>
                            <div>Expiration: {{ $task -> expiration }} </div>
                            <hr>
                        </div>

                        <div class="flex gap-2">
                            <div>
                                <span class="cursor-pointer px-2 bg-pink-900 text-white" @click="showDelete = true "> Delete </span>
                            </div>
                            <div>
                                <span class="cursor-pointer px-2 bg-violet-500 text-white" @click="showEdit = true "> Edit </span>
                            </div>
                        </div>

                        <template x-if="showDelete">
                            <div class="absolute top-0 button-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                                <div class="w-96 bg-pink-200 p-4 absolute left-1/4 right-1/4 top-1/4 z-10 ">

                                    <h2 class="text-xl font-bold text-center">Are you sure you want to delete this task?</h2>

                                    <div class="flex justify-between mt-4">
                                        <form action="{{  route('task.destroy', $task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button class="bg-pink-500" > Delete </x-danger-button>
                                        </form>
                                        <x-primary-button class="bg-violet-900" @click="showDelete = false"> Cancel </x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="showEdit">
                            <div class="absolute top-0 button-0 left-0 right-0 bg-gray-800 bg-opacity-20 z-0">
                                <div class="w-96 bg-white p-4 absolute left-1/4 right-1/4 top-1/4 z-10 ">

                                    <h2 class="text-xl font-bold text-center">{{ $task->description }}</h2>
                                    
                                    <form class="my-4" action="{{  route('task.update', $task) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <x-text-input name="description" placeholder="Descrição" value="{{ $task->description }}" required></x-text-input>
                                        <x-text-input name="expiration" placeholder="Expiração" value="{{ $task->expiration }}" required></x-text-input>
                                        <x-primary-button> Edit </x-primary-button>
                                    </form>
                                    <x-primary-button @click="showEdit = false" class="w-full"> Cancel </x-primary-button>
                                </div>
                            </div>
                        </template>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
