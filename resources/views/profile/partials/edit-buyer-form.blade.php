<fieldset class="border-t pt-8">
    <legend class="text-lg font-semibold text-gray-700">Detail Buyer</legend>
    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="company_name" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
            <input type="text" name="company_name" id="company_name"
                value="{{ old('company_name', $buyer->company_name) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="contact_person_name" class="block text-sm font-medium text-gray-700">Nama Kontak</label>
            <input type="text" name="contact_person_name" id="contact_person_name"
                value="{{ old('contact_person_name', $buyer->contact_person_name) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="country" class="block text-sm font-medium text-gray-700">Negara</label>
            <input type="text" name="country" id="country" value="{{ old('country', $buyer->country) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <label for="city" class="block text-sm font-medium text-gray-700">Kota</label>
            <input type="text" name="city" id="city" value="{{ old('city', $buyer->city) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="md:col-span-2">
            <label for="products_of_interest" class="block text-sm font-medium text-gray-700">Produk yang Diminati
                (pisahkan dengan koma)</label>
            <input type="text" name="products_of_interest" id="products_of_interest"
                value="{{ old('products_of_interest', is_array($buyer->products_of_interest) ? implode(', ', $buyer->products_of_interest) : '') }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        <div class="md:col-span-2">
            <label for="additional_notes" class="block text-sm font-medium text-gray-700">Catatan Tambahan</label>
            <textarea name="additional_notes" id="additional_notes" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('additional_notes', $buyer->additional_notes) }}</textarea>
        </div>
    </div>
</fieldset>
