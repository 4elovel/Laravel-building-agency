@props(['postRouteName', 'complexes'])

<link rel="stylesheet" href="{{ asset('build/assets/apartment-application-form.css') }}">

<form method="POST" action="{{ route($postRouteName) }}" id="applicationForm" class="application-form">
    @csrf
    <div class="form-group">
        <label for="name">{{ __('form.name') }}:</label>
        <input type="text" id="name" name="name" value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}" required>
        @error('name')
        <div class="error">{{ __('form.error') }}: {{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">{{ __('form.email') }}:</label>
        <input type="email" id="email" name="email" value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}" required>
        @error('email')
        <div class="error">{{ __('form.error') }}: {{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">{{ __('form.phone') }}:</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
        @error('phone')
        <div class="error">{{ __('form.error') }}: {{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="complex">{{ __('form.complex') }}:</label>
        <select id="complex" name="complex" required>
            @foreach($complexes as $complex)
                <option value="{{ $complex->id }}" {{ old('complex') == $complex->id ? 'selected' : '' }}>{{ $complex->name }}</option>
            @endforeach
        </select>
        @error('complex')
        <div class="error">{{ __('form.error') }}: {{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="apartment_type">{{ __('form.apartment_type') }}:</label>
        <input type="text" id="apartment_type" name="apartment_type" value="{{ old('apartment_type') }}" required>
        @error('apartment_type')
        <div class="error">{{ __('form.error') }}: {{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="area">{{ __('form.area') }}:</label>
        <input type="number" id="area" name="area" value="{{ old('area') }}" required>
        @error('area')
        <div class="error">{{ __('form.error') }}: {{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="budget">{{ __('form.budget') }}:</label>
        <input type="number" id="budget" name="budget" value="{{ old('budget') }}" required>
        @error('budget')
        <div class="error">{{ __('form.error') }}: {{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="submit-button">{{ __('form.submit') }}</button>
</form>

@if (session('success'))
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script>
        swal("Успіх!", "{{ session('success') }}", "success");
    </script>
@endif
@if (session('error'))
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script>
        swal("Провалено ): ", "{{ session('error') }}", "error");
    </script>
@endif
