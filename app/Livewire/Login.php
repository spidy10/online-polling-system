<?php

namespace App\Livewire;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

	public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $userRepository;

    public function mount(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        $this->validate();

        $user = $this->userRepository->findByEmail($this->email);

        if ($user && Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
        }

        session()->flash('error', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
