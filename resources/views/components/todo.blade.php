@props(['created_at', 'updated_at', 'id_todo', 'completed'])


<div class="max-w-4xl mx-auto bg-gray-800 rounded-2xl shadow-xl overflow-hidden w-full">
    <div class="p-8">
        <label
            class="flex items-start flex-wrap md:flex-nowrap md:items-center gap-4 hover:bg-gray-700 p-4 rounded-2xl cursor-pointer w-full">
            <form action="{{ route('todos.updatestatues', $id_todo) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="completed" value="0">
                <input type="checkbox" name="completed" value="1" onchange="this.form.submit()"
                    {{ $completed ? 'checked' : '' }}
                    class="h-6 w-6 text-purple-600 focus:ring-purple-500 rounded-full border-gray-700 mt-1 md:mt-0">
            </form>

            <div class="flex-1 min-w-0">
                <span class="block text-white text-xl font-semibold whitespace-normal break-words">
                    {{ $slot }}
                </span>
                <span class="block text-gray-400 text-sm whitespace-normal">Created at
                    {{ $created_at }}</span>
                <span class="block text-gray-400 text-sm whitespace-normal">Updated at
                    {{ $updated_at }}</span>
            </div>

            <div class="flex-shrink-0 flex gap-2 ml-auto">
                <form action="{{ route('todos.destroy', $id_todo) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this todo?');">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $id_todo }}">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">
                        Delete
                    </button>
                </form>

                <a href="{{ route('todos.edit', $id_todo) }}">
                    <button class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full">
                        Edit
                    </button>
                </a>
            </div>
        </label>
    </div>
</div>
