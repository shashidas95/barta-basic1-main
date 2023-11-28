<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'mt-1 p-2 border rounded-md']) }}>
    @error($name) <span class="text-red-500">{{ $message }}</span> @enderror
</div>
