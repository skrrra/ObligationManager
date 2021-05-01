@extends('layouts.app')

@section('content')
    <div id="content" class="bg-gray-50 shadow-xl rounded w-full opacity-0 max-h-screen h-full">
        <h1 class="text-2xl font-semibold text-gray-600 py-2 pt-10 px-16 border-b-2 border-gray-200">My Profile</h1>


        <div class="mt-24">
            
            <p class="text-2xl font-semibold text-gray-600 px-16">Manage Personal Informations</p>

            @if (session('status'))
                <div class="bg-green-600 p-5 rounded-md mx-16 flex flex-row justify-center">
                    <div class="text-white">
                        {{ session('status') }}
                    </div>
                    <div class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            @endif

                {{-- change username --}}
                <div class="w-1/3 border-2 border-gray-300 mt-10 ml-16 px-3 rounded-lg">
                    <div class="flex flex-row justify-between">
                            
                        <div class="py-4 w-full">
                            <p class="text-lg font-semibold my-auto">Change Username</p>
                        </div>
        
                        <div class="my-auto w-full">
                            <button class="focus:outline-none w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" id="arrowUser" class="float-right h-6 w-6 my-auto transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="username" class="hidden">
                        <hr class="">
                        <form action="/profile/update-username/{user}" method="POST">
                            @csrf
                            @method('PATCH')
                            <p class="mt-2 px-2 text-lg">Current Username: <span class="font-bold text-gray-700">{{ auth()->user()->name }}</span></p>
                            <input type="text" name="username" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="New Username">
                            <input type="password" name="password" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Current Password">
                            <button class="w-full bg-green-500 rounded px-3 py-2 my-4 font-bold text-white">Update</button>
                        </form>
                    </div>
                </div>

                {{-- change password --}}
                <div class="w-1/3 border-2 border-gray-300 mt-10 ml-16 px-3 rounded-lg">
                    <div class="flex flex-row">
                        <div class="py-4 w-full">
                            <p class="text-lg font-semibold my-auto">Change Password</p>
                        </div>
    
                        <div class="my-auto w-full">
                            <button class="focus:outline-none w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" id="arrowPass" class="float-right h-6 w-6 my-auto transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div id="password" class="hidden"> {{-- hidden --}}
                        <hr class="mb-4">
                        <form action="/profile/update-password/{{ $user->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="password" name="password" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Current Password">
                            <input type="password" name="newpassword" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="New Password">
                            <input type="password" name="newpassword_confirmation" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Confirm New Password">
                            <button class="w-full bg-green-500 rounded px-3 py-2 my-4 font-bold text-white">Update</button>
                        </form>
                    </div>
                </div>

                {{-- change email --}}
                <div class="w-1/3 border-2 border-gray-300 mt-10 ml-16 px-3 rounded-lg">
                    <div class="flex flex-row justify-between">
                        <div class="py-4 w-full">
                            <p class="text-lg font-semibold my-auto">Change Email</p>
                        </div>
    
                        <div class="my-auto w-full">
                            <button class="focus:outline-none w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" id="arrowEmail" class="float-right h-6 w-6 my-auto transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div id="email" class="hidden"> {{-- hidden --}}
                        <hr class="">
                        <form action="/profile/update-email/{{ $user->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <p class="mt-2 px-2 text-lg">Current Email: <span class="font-bold text-gray-700">{{ auth()->user()->email }}</span></p>
                            <input type="email" name="newemail" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="New Email">
                            <input type="password" name="password" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Current Password">
                            <button class="w-full bg-green-500 rounded px-3 py-2 my-4 font-bold text-white">Update</button>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
    <script>

    $(document).ready(function() {
        $("#arrowUser").click(function() {
            $("#username").slideToggle(400);
            $("#arrowUser").toggleClass("-rotate-90");
            $("#password").slideUp();
            $("#arrowPass").removeClass("-rotate-90");
            $("#email").slideUp();
            $("#arrowEmail").removeClass("-rotate-90");
        });
        $("#arrowPass").click(function() {
            $("#password").slideToggle(400)
            $("#arrowPass").toggleClass("-rotate-90");
            $("#username").slideUp();
            $("#arrowUser").removeClass("-rotate-90");
            $("#email").slideUp();
            $("#arrowEmail").removeClass("-rotate-90");
        });
        $("#arrowEmail").click(function() {
            $("#email").slideToggle(400)
            $("#arrowEmail").toggleClass("-rotate-90");
            $("#username").slideUp();
            $("#arrowUser").removeClass("-rotate-90");
            $("#password").slideUp();
            $("#arrowPass").removeClass("-rotate-90");
        });
    });
    
    </script>   
@endsection