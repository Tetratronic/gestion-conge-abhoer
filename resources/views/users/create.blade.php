<x-app-layout>>
    <div class="flex flex-wrap items-center justify-center ">
        <div class="bg-white p-10 rounded-md">    
            <form method="POST" action="{{route('users.store')}}" class="flex flex-col justify-between"> 
                @csrf
                @method('POST')
                <div class="flex flex-col"> <label class="mb-1" for="login">Login:</label>
                    <input type="text" name="login" id="login" required > 
                    @error('login')
                        <span class="text-xs text-red-600">{{ $message }}</span>
                    @enderror
                </div>
 
                <div class="mb-0 flex flex-col"> <label class="mb-1" for="email">Email:</label>
                    <input type="text" name="email" id="email" required > 
                </div>
                @error('email')
                <span class="text-xs text-red-600">{{ $message }}</span>
            @enderror

                <div class="mb-0 flex flex-col"> 
                    <label for="role">Role:</label>
                    <select name="role" id="role" required >
                        <option value="rh">RH</option> 
                        <option value="admin">Administrateur</option>
                        </select> 
                </div>

                <div class="mb-0 flex flex-col"> <label class="mb-1" for="password">Mot de Passe:</label>
                    <input type="password" name="password" id="password" required > 
                    @error('password')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
                </div>

                <div class="mb-0 flex flex-col"> <label class="mb-1" for="password_confirmation">Confirmer le Mot de Passe:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required > 
                    @error('password_confirmation')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
                </div>

                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold rounded m-4 p-4">
                    Ajouter
                </button>
            </form> 
        </div>
    </div>
</x-app-layout>