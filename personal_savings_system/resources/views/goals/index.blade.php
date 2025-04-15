<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Savings Goals') }}
            </h2>
            <a href="{{ route('goals.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Add Goal
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($goals as $goal)
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $goal->title }}</h3>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $goal->is_completed ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $goal->is_completed ? 'Completed' : 'Active' }}
                        </span>
                    </div>
                    
                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-gray-500 mb-1">
                            <span>Progress</span>
                            <span>{{ number_format($goal->progress, 1) }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $goal->progress }}%"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-500">Target Amount</p>
                            <p class="text-lg font-semibold text-gray-900">RWF {{ number_format($goal->target_amount, 2) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Saved Amount</p>
                            <p class="text-lg font-semibold text-gray-900">RWF {{ number_format($goal->saved_amount, 2) }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Deadline</p>
                        <p class="text-sm font-medium text-gray-900">{{ $goal->deadline->format('M d, Y') }}</p>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('goals.edit', $goal) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('goals.destroy', $goal) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this goal?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $goals->links() }}
    </div>
</x-app-layout> 