<x-layouts::app :title="__('Edit Portfolio')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 max-w-3xl">
        <div>
            <flux:heading size="xl">{{ __('Edit Portfolio') }}</flux:heading>
            <flux:text class="mt-1">{{ __('Perbarui data portfolio proyek.') }}</flux:text>
        </div>

        @if(session('success'))
            <flux:callout variant="success" icon="check-circle" dismissible>
                {{ session('success') }}
            </flux:callout>
        @endif

        <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <flux:field>
                <flux:label>{{ __('Judul') }}</flux:label>
                <flux:input name="title" value="{{ old('title', $portfolio->title) }}" placeholder="Masukkan judul portfolio" required />
                @error('title') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Deskripsi Singkat') }}</flux:label>
                <flux:input name="short_desc" value="{{ old('short_desc', $portfolio->short_desc) }}" placeholder="Deskripsi singkat proyek" required />
                @error('short_desc') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Detail Konten') }}</flux:label>
                <flux:textarea name="detail_content" rows="8" placeholder="Tulis detail proyek..." required>{{ old('detail_content', $portfolio->detail_content) }}</flux:textarea>
                @error('detail_content') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Tanggal Proyek') }}</flux:label>
                <flux:input type="date" name="project_date" value="{{ old('project_date', $portfolio->project_date->format('Y-m-d')) }}" required />
                @error('project_date') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            {{-- Existing Images --}}
            @if($portfolio->images->count() > 0)
                <div>
                    <flux:label class="mb-2">{{ __('Gambar Saat Ini') }}</flux:label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                        @foreach($portfolio->images as $image)
                            <div class="group relative rounded-lg overflow-hidden border border-neutral-200 dark:border-neutral-700">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Portfolio image" class="h-28 w-full object-cover">
                                <form method="POST" action="{{ route('admin.portfolio-images.destroy', $image) }}" onsubmit="return confirm('Hapus gambar ini?')" class="absolute top-1 right-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full bg-red-500/80 p-1 text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <flux:field>
                <flux:label>{{ __('Tambah Gambar Baru') }}</flux:label>
                <flux:input type="file" name="images[]" accept="image/*" multiple />
                <flux:text class="text-xs">{{ __('Gambar baru akan ditambahkan, bukan menggantikan gambar lama.') }}</flux:text>
                @error('images.*') <flux:text class="!text-red-500 text-sm">{{ $message }}</flux:text> @enderror
            </flux:field>

            <div class="flex items-center gap-3">
                <flux:button type="submit" variant="primary">{{ __('Perbarui') }}</flux:button>
                <flux:button href="{{ route('admin.portfolios.index') }}" wire:navigate variant="ghost">{{ __('Batal') }}</flux:button>
            </div>
        </form>
    </div>
</x-layouts::app>
