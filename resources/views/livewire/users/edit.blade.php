<?php

use Livewire\Volt\Component;
use App\Models\User;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule; 
use App\Models\Country;

new class extends Component {
    use Toast;

    public User $user;

    #[Rule('required')] 
    public string $name = '';
 
    #[Rule('required|email')]
    public string $email = '';

    // Optional
    #[Rule('sometimes')]
    public ?int $country_id = null;

    // We also need this to fill Countries combobox on upcoming form
    public function with(): array 
    {
        return [
            'countries' => Country::all()
        ];
    }

    public function mount(): void
    {
        
    }

    public function save(): void
    {
        // Validate
        $data = $this->validate();
    
        // Update
        $this->user->update($data);
    
        // You can toast and redirect to any route
        $this->success('User updated with success.', redirectTo: '/users');
    }

}; ?>

<div>
    <x-header :title="'Update user" separator /> 
    
    <x-form wire:submit.prevent="save"> 
        <x-input label="Name" wire:model="name" />
        <x-input label="Email" wire:model="email" />
        <x-select label="Country" wire:model="country_id" :options="$countries" placeholder="---" />
 
        <x-slot:actions>
            <x-button label="Cancel" link="/users" />
            {{-- The important thing here is `type="submit"` --}}
            {{-- The spinner property is nice! --}}
            <x-button label="Save" icon="o-paper-airplane" spinner="save" type="submit" class="btn-primary" />
        </x-slot:actions>
    </x-form>
</div>
