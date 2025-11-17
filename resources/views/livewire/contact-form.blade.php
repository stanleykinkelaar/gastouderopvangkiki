<div>
    <form wire:submit="send" class="contact-form" aria-labelledby="contact-form-title">
        <h3 id="contact-form-title">Stuur een bericht</h3>
        <p>Vertel me gerust waar ik u mee kan helpen - ik beantwoord uw bericht zo snel mogelijk!</p>

        <div class="form-group">
            <label for="name">Naam *</label>
            <input type="text" id="name" wire:model="name" required aria-required="true" autocomplete="name">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">E-mail *</label>
            <input type="email" id="email" wire:model="email" required aria-required="true" autocomplete="email">
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Telefoon</label>
            <input type="tel" id="phone" wire:model="phone" autocomplete="tel">
            @error('phone')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Bericht *</label>
            <textarea id="message" wire:model="message" rows="5"
                      placeholder="Vertel ons over uw kind en uw opvangwensen..." required
                      aria-required="true"></textarea>
            @error('message')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <x-turnstile wire:model="turnstileResponse" data-theme="light" />
            @error('turnstileResponse')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="submit-btn" wire:loading.attr="disabled">
            <span class="btn-text" wire:loading.remove>Verstuur Bericht</span>
            <span class="btn-loading" wire:loading>Verzenden...</span>
        </button>

        @if($success)
            <div class="form-message">
                <div class="success" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #059669; padding: 1rem; border-radius: 10px; animation: slideIn 0.3s ease;">
                    <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                    {{ $successMessage }}
                </div>
            </div>
        @endif

        @if($errorMessage)
            <div class="form-message">
                <div class="error" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #dc2626; padding: 1rem; border-radius: 10px; animation: shake 0.5s ease;">
                    <i class="fas fa-exclamation-circle" style="margin-right: 0.5rem;"></i>
                    {{ $errorMessage }}
                </div>
            </div>
        @endif
    </form>
</div>
