<x-app-layout>
    <section
        class="max-w-screen-md my-10 mx-auto block bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900">
        <div class="py-8 mx-auto sm:max-w-lg sm:py-16">
            <div>
                @if (session('new-create-message'))
                    <x-alert-message name="new-create" color="blue">
                        {{ session('new-create-message') }}
                    </x-alert-message>
                @endif
                @if (session('error-message'))
                    <x-alert-message name="error" color="red">
                        {{ session('error-message') }}
                    </x-alert-message>
                @endif
            </div>
            <div>
                <h2 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">{{ __('create_asset') }}</h2>
            </div>
            <hr class="h-px my-6 bg-gray-200 border-1 dark:bg-gray-700">
            <form id="created-form" class="validated-form mb-2" method="post" action="{{ route('assets.store') }}"
                novalidate>
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fa-regular fa-circle-check text-red-500"></i>
                            {{ __('asset_name') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                            placeholder="資産名を入力してください" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><i
                                class="fa-regular fa-circle-check text-red-500 me-0.5"></i>{{ __('amount') }}</label>
                        <input type="number" name="amount" id="amount" value="{{ old('amount') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                            placeholder="資産額を入力してください" required>
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <label for="registration_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><i
                                class="fa-regular fa-circle-check text-red-500 me-0.5"></i>{{ __('registration_date') }}</label>
                        <input type="date" name="registration_date" id="registration_date"
                            value="{{ $formatDate }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                            required>
                        <x-input-error :messages="$errors->get('registration_date')" class="mt-2" />
                    </div>
                    <div>
                        <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><i
                                class="fa-regular fa-circle-check text-red-500 me-0.5"></i>{{ __('genre_name') }}</label>
                        <select id="genre_id" name="genre_id"
                            class="cursor-pointerbg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                            required>
                            <option value="">--選択してください--</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                    <div class="catagory-select-box">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><i
                                class="fa-regular fa-circle-check text-red-500 me-0.5"></i>{{ __('category_name') }}</label>
                        <select id="category_id" name="category_id"
                            class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                            required disabled>
                            <option value="">--選択してください--</option>
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-2">
                        <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white"><i
                                class="fa-regular fa-circle-check text-red-500 me-0.5"></i>資産タイプ選択</p>
                        <ul class="grid gap-6 md:grid-cols-2">
                            <li>
                                <input type="checkbox" id="current-asset" name="asset_type_flg" value="0"
                                    class="hidden peer" checked>
                                <label for="current-asset"
                                    class="inline-flex items-center justify-between w-full p-2.5 text-gray-500 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-500 hover:text-gray-600 dark:peer-checked:text-gray-500 peer-checked:text-gray-800 hover:bg-green-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="w-full font-semibold mb-2"><i
                                                class="fa-solid fa-money-bill-trend-up text-green-500 me-1"></i>流動資産
                                        </div>
                                        <div class="w-full text-sm">
                                            <i class="fa-solid fa-circle-info text-green-500 mb-0.5"></i>
                                            資産の価値が毎月<u class="underline font-semibold">変動する</u>場合はこちらを選択してください
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="fixed-asset" name="asset_type_flg" value="1"
                                    class="hidden peer">
                                <label for="fixed-asset"
                                    class="inline-flex items-center justify-between w-full p-2.5 text-gray-500 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-blue-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="w-full font-semibold mb-2"><i
                                                class="fa-solid fa-vault text-blue-600 me-1"></i>固定資産</div>
                                        <div class="w-full text-sm"><i
                                                class="fa-solid fa-circle-info text-blue-600 mb-0.5"></i>
                                            資産の価値が毎月<u class="underline font-semibold">変動しない</u>場合はこちらを選択してください
                                        </div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <button type="submit" id="created-btn"
                    class="inline-flex items-center px-5 py-2.5 mt-3 sm:mt-6 text-sm font-medium text-center text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 rounded-full dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg id="check-icon" class="w-6 h-6 me-1 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <svg aria-hidden="true" role="status" id="loading-icon"
                        class="w-4 h-4 me-3 text-white animate-spin hidden" viewBox="0 0 100 101" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="#E5E7EB" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentColor" />
                    </svg>
                    {{ __('create') }}
                </button>
            </form>
        </div>
    </section>
    @section('scripts')
        <script type="text/javascript">
            const categories = {!! json_encode($categories) !!}
        </script>
    @endsection
    @push('script-files')
        @vite('resources/js/asset-create.js')
        @vite('resources/js/create-with-update.js')
    @endpush
</x-app-layout>
