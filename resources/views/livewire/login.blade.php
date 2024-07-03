<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="login">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" wire:model="email" id="email" class="form-control">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" wire:model="password" id="password" class="form-control">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
