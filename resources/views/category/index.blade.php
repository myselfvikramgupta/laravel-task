<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cateogry') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('categories.add') }}">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Add Category')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class=" gap-4 mt-4 flex-row">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @php
                            $cat=session('cat');
                            @endphp
                            <ul>
                           @isset($cat)
                           @for($i=0;$i<count($cat);$i++)
                           <li>{{$cat[$i]}}</li>
                       @endfor
                             @endisset
                            
                             
                          
                            </ul>
                        </form>
                            <form method="POST" action="{{ route('categories.addall') }}">
                                @csrf
                                <x-primary-button>{{ __('Save All') }}</x-primary-button>
                            </form>
                            @if (session('status') === 'Added')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                            >{{ __('Saved.') }}</p>
                        @endif
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
