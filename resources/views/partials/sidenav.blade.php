@php
use App\Models\Category;

$categories = Category::where('user_id', auth()->id())->get();   

@endphp

<div class="scrollbar-thin scrollbar-thumb-gray-400 pr-2 scrollbar-thumb-rounded-full flex-shrink-0"> 
    <div class="">
        <div class="flex flex-col sm:flex-row sm:justify-around">
            <div class="w-64 h-screen bg-white">

                <div class="bg-white fixed w-64 shadow">
                    <div class="flex items-center justify-center mt-8 pb-4">
                        <img class="h-10" src="https://images-eu.ssl-images-amazon.com/images/I/41da3NERJ4L.png">
                        <p class="text-gray-700">OBLIGATION<span class="font-black">MANAGER</span></p>
                    </div>
                </div>

                    <div class="mt-24">
                        <div class="top-0">

                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                
                                <span class="mx-4 font-medium">Priority Tasks</span>
                            </x-nav-link>
                
                            <a class="flex items-center py-3 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                
                                <span class="mx-4 font-medium">Completed</span>
                            </a>
                
                            <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                
                                <span class="mx-4 font-medium">My Profile</span>
                            </x-nav-link>
                
                            <a id="newcat" class="cursor-pointer mt-5 flex items-center py-3 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                </svg>
                
                                <span class="mx-4 font-medium">New Category</span>
                            </a>

                            <div id="newCategory" class="hidden shadow-lg mb-3 border-l-2 border-r-2 border-gray-200">
                                <hr class="">
                                <form action="/category/new/{{ auth()->id() }}" method="POST">
                                    @csrf
                                    <p class="font-semibold text-gray-600 text-lg my-2 ml-3">Create new category</p>
                                    <input type="text" name="name" class="py-1 w-full font-semibold border-2 border-gray-100" placeholder="Category name">
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <hr>
                                    <button class="w-full py-2 font-bold text-gray-600 hover:bg-gray-100 transition duration-300">Create</button>
                                </form>
                            </div>

                        </div>
                    </div>

                <div class="pb-2">
                    @foreach ($categories as $category)
                        <div class="my-2">
                            <div class="flex flex-row justify-between">
                                <p class="px-8 font-semibold text-lg my-auto">{{$category->name}}</p>

                                <div class="flex flex-row">

                                    <div class="px-1 max-w-5">
                                        <button class="hover:bg-gray-300 py-1 px-1 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    
                                    <div class="px-1">
                                        <form action="/category/delete/{{$category->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="hover:bg-gray-300 py-1 px-1 rounded-lg">
                                                <svg class="h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            

                            <div class="">
                                <a class="flex items-center py-2 px-8 text-gray-600 border-r-4 border-white hover:bg-gray-200 hover:text-gray-700 hover:border-gray-700" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                    </svg>
    
                                    <span class="mx-4 font-medium">New task</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bottom-0 bg-white pt-2 border-t-2 fixed w-64">
                    <div class="">
                        <div class="flex items-center mb-2 px-8">
                            <p class="text-gray-700 font-semibold text-lg">Hello, {{ Auth::user()->name }} !</p>
                        </div>
                        <div class="flex items-center mb-5 px-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#4f4f4f">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <p class="text-gray-700 font-semibold ml-2 text-lg">Logout</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>