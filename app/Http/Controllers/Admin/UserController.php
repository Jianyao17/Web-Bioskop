<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bioskop;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

// Super Admin
class UserController extends Component
{
    use WithPagination;
    
    public $name, $email, $password, $role, $user_id;
    public $list_role, $filter_role = '',  $search = '';
    
    public function render()
    {
        $this->list_role = Bioskop::all()->map->AdminType();
        
        $users = User::query();
        $users->where('name', 'like', '%' . $this->search . '%');

        if ($this->filter_role != 'All') 
        {
            $users->where('role', 'like', $this->filter_role.'%');
        }
        
        $users = $users->orderBy('name')->paginate(20);

        return view('Admin.users', ['users' => $users])
            ->extends('_Layouts.base-admin', ['page' => 'Users']);
    }

    public function store()
    {
        $this->validate([
            'name'      => 'required|min:4|max:255',
            'email'     => 'required|email',
            'password'  => 'required|string|min:4',
            'role'      => 'required|string',
        ]);


        User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => Hash::make($this->password),
            'role'      => $this->role,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'User Berhasil Ditambahkan']);
    }

    public function editUser($id) 
    {
        $user = User::find($id);

        if (!$user) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'User Tidak Ditemukan']);  
            return;
        }
        
        $this->user_id = $id; 
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update() 
    {
        // Validate data to be updated
        $this->validate([ 
            'name' => 'required|min:4|max:255|unique:users,name,'.$this->user_id,
            'email' => 'required|email',
            'password' => 'required|string|min:4',
            'role' => 'required|string',
        ]);
        
        // Update data in database
        User::find($this->user_id)->update(
        [
            'name'      => $this->name,
            'email'     => $this->email,
            'password'  => Hash::make($this->password),
            'role'      => $this->role,
        ]);

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'User Berhasil Diperbarui']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) 
        {
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('notify', 
            [ 'type' => 'failed', 'message' => 'User Tidak Ditemukan']);  
            return;
        }

        $this->user_id = $id;
        $this->name = $user->name;
    }

    public function delete()
    {
        User::find($this->user_id)->delete();

        $this->resetValue();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('notify', 
        [ 'type' => 'success', 'message' => 'User Berhasil Dihapus']);
    }

    public function resetValue()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = '';
    }
}
