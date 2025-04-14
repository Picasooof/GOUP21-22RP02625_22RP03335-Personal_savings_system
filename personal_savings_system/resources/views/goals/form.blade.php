@props(['goal' => null])

<div class="space-y-6">
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" :value="old('title', $goal?->title)" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    <div>
        <x-input-label for="target_amount" :value="__('Target Amount')" />
        <x-text-input id="target_amount" name="target_amount" type="number" step="0.01" min="0" :value="old('target_amount', $goal?->target_amount)" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('target_amount')" />
    </div>

    <div>
        <x-input-label for="saved_amount" :value="__('Saved Amount')" />
        <x-text-input id="saved_amount" name="saved_amount" type="number" step="0.01" min="0" :value="old('saved_amount', $goal?->saved_amount)" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('saved_amount')" />
    </div>

    <div>
        <x-input-label for="deadline" :value="__('Deadline')" />
        <x-text-input id="deadline" name="deadline" type="date" :value="old('deadline', $goal?->deadline?->format('Y-m-d'))" class="mt-1 block w-full" />
        <x-input-error class="mt-2" :messages="$errors->get('deadline')" />
    </div>

    @if($goal)
        <div>
            <label class="inline-flex items-center">
                <input type="checkbox" name="is_completed" value="1" {{ old('is_completed', $goal->is_completed) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                <span class="ml-2 text-sm text-gray-600">Mark as completed</span>
            </label>
        </div>
    @endif
</div> 