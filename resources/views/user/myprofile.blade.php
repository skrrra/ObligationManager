@extends('layouts.app')

@section('content')
    <div id="content" class="bg-gray-50 shadow-xl rounded w-full opacity-0 h-full">
        <h1 class="text-2xl font-semibold text-gray-600 py-2 mt-10 px-16 border-b-2 border-gray-200">My Profile</h1>


        <div class="mt-24">
            
            <p class="text-2xl font-semibold text-gray-600 px-16">Manage Personal Informations</p>

                {{-- change username --}}
                <div class="w-1/3 border-2 border-gray-300 mt-10 ml-16 px-3 rounded-lg">
                    <div class="flex flex-row">
                        <div class="flex flex-col py-4">
                        
                            <div class="">
                                <p class="text-lg font-semibold my-auto">Username:</p>
                            </div>
                            <div class="">
                                <p class="text-lg text-gray-500 font-bold my-auto">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
    
                        <div class="my-auto w-full">
                            <button class="float-right focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" id="arrowUser" onclick="document.getElementById('arrowUser').classList.toggle('-rotate-90')" class="h-6 w-6 my-auto transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div id="username" class="hidden">
                        <hr class="">
                        <form action="">
                            @csrf
                            @method('PUT')
                            <input type="text" name="username" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="New Username">
                            <input type="password" name="password" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Current Password">
                            <button class="w-full bg-green-500 rounded px-3 py-2 mb-2 font-bold text-white">Update</button>
                        </form>
                    </div>
                </div>

                {{-- change password --}}
                <div class="w-1/3 border-2 border-gray-300 mt-10 ml-16 px-3 rounded-lg">
                    <div class="flex flex-row">
                        <div class="flex flex-col py-4">
                            <p class="text-lg font-semibold my-auto">Update Password</p>
                        </div>
    
                        <div class="my-auto w-full">
                            <button class="float-right focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" id="arrowPass" onclick="document.getElementById('arrowPass').classList.toggle('-rotate-90')" class="h-6 w-6 my-auto transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div id="password" class="hidden"> {{-- hidden --}}
                        <hr class="">
                        <form action="">
                            @csrf
                            @method('PUT')
                            <input type="password" name="password" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Current Password">
                            <input type="password" name="newpassword" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="New Password">
                            <input type="password" name="confirmnewpassword" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Confirm New Password">
                            <button class="w-full bg-green-500 rounded px-3 py-2 mb-2 font-bold text-white">Update</button>
                        </form>
                    </div>
                </div>

                {{-- change email --}}
                <div class="w-1/3 border-2 border-gray-300 mt-10 ml-16 px-3 rounded-lg">
                    <div class="flex flex-row justify-between">
                        <div class="py-4">
                            <p class="text-lg font-semibold my-auto">Update Email</p>
                            <p class="text-lg text-gray-500 font-bold my-auto">{{ auth()->user()->email }}</p>
                        </div>
    
                        <div class="my-auto max-w-24">
                            <button class="focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" id="arrowEmail" onclick="document.getElementById('arrowEmail').classList.toggle('-rotate-90')" class="h-6 w-6 my-auto transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div id="email" class="hidden"> {{-- hidden --}}
                        <hr class="">
                        <form action="">
                            @csrf
                            @method('PUT')
                            <input type="text" name="password" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="New Email">
                            <input type="password" name="newpassword" class="py-1 w-full outline-none border-gray-200 rounded-lg my-2" placeholder="Current Password">
                            <button class="w-full bg-green-500 rounded px-3 py-2 mb-2 font-bold text-white">Update</button>
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
    <script>

        $(document).ready(function(){
            $("#arrowUser").click(function(){
                $("#username").slideToggle(400);
                $("#password").slideUp();
                $("#email").slideUp();
                $("#arrowUser").toggleClass('-rotate-90');
            });
        });
    
        $(document).ready(function(){
            $("#arrowPass").click(function(){
                $("#password").slideToggle(400);
                $("#username").slideUp();
                $("#email").slideUp();
                $("#arrowPass").toggleClass('-rotate-90');
            });
        });
    
        $(document).ready(function(){
            $("#arrowEmail").click(function(){
                $("#email").slideToggle(400);
                $("#username").slideUp();
                $("#password").slideUp();
                $("#arrowEmail").toggleClass('-rotate-90');
            });
        });
    
    
    </script>   
@endsection