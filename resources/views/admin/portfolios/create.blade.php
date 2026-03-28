<x-layouts::app :title="__('Tambah Portfolio')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 max-w-3xl">
        <div>
            <flux:heading size="xl">{{ __('Tambah Portfolio') }}</flux:heading>
            <flux:text class="mt-1">{{ __('Buat portfolio proyek baru.') }}</flux:text>
        </div>

        <form method="POST" action="{{ route('admin.portfolios.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <flux:field>
                <flux:label>{{ __('Judul') }}</flux:label>
                <flux:input name="title" value="{{ old('title') }}" placeholder="Masukkan judul portfolio" required />
                @error('title') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Deskripsi Singkat') }}</flux:label>
                <flux:input name="short_desc" value="{{ old('short_desc') }}" placeholder="Deskripsi singkat proyek" required />
                @error('short_desc') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Detail Konten') }}</flux:label>
                <flux:textarea name="detail_content" rows="8" placeholder="Tulis detail proyek..." required>{{ old('detail_content') }}</flux:textarea>
                @error('detail_content') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Tanggal Proyek') }}</flux:label>
                <flux:input type="date" name="project_date" value="{{ old('project_date') }}" required />
                @error('project_date') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Gambar Portfolio') }}</flux:label>
                <flux:input type="file" name="images[]" accept="image/*" multiple />
                <flux:text class="text-xs">{{ __('Anda dapat memilih beberapa gambar sekaligus.') }}</flux:text>
                @error('images.*') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <div class="flex items-center gap-3">
                <flux:button type="submit" variant="primary">{{ __('Simpan') }}</flux:button>
                <flux:button href="{{ route('admin.portfolios.index') }}" wire:navigate variant="ghost">{{ __('Batal') }}</flux:button>
            </div>
        </form>
    </div>
</x-layouts::app>
