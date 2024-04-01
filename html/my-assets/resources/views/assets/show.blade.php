<x-app-layout>
    <section
        class="max-w-screen-md my-10 mx-auto block bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-900">
        <div class="py-5 mx-auto max-w-lg lg:py-16">
            <div class="alert-message">
                @if (session('error-message'))
                    <x-alert-message name="error" color="red">
                        {{ session('error-message') }}
                    </x-alert-message>
                @endif
            </div>
            <div class="heading-title mt-3">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ __('edit_asset') }}</h2>
            </div>
            <hr class="h-px my-6 bg-gray-200 border-1 dark:bg-gray-700">
            <form id="updated-form" class="validated-form mb-2" method="post"
                action="{{ route('assets.update', [$assetData->id]) }}" novalidate>
                @csrf
                @method('PATCH')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="action-checkbox flex sm:col-span-2">
                        <input type="hidden" name="changed_type_flg" value="0">
                        <p class="me-4 text-sm font-medium text-gray-900 dark:text-white"><svg
                                class="inline align-middle w-4 h-4 mb-0.5 me-0.5 text-green-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            資産を追加する場合は、こちらをチェックしてください</p>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="changed_type_flg" name="changed_type_flg" value="1"
                                class="sr-only peer">
                            <div
                                class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                        </label>
                    </div>
                    <div class="name-input sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><svg
                                class="inline align-middle w-4 h-4 mb-0.5 me-0.5 text-red-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>{{ __('asset_name') }}</label>
                        <input type="text" name="name" id="name" value="{{ $assetData->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="amount-input w-full">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><svg
                                class="inline align-middle w-4 h-4 mb-1 me-0.5 text-red-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>{{ __('amount') }}</label>
                        <input type="number" name="amount" id="amount" value="{{ $assetData->amount }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                        <input type="hidden" name="format-amount" id="format-amount"
                            value="{{ number_format($assetData->amount) }}" required>
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>
                    <div class="registration_date-input w-full">
                        <label for="registration_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><svg
                                class="inline align-middle w-4 h-4 mb-1 me-0.5 text-red-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>{{ __('registration_date') }}</label>
                        <input type="date" name="registration_date" id="registration_date"
                            value="{{ $assetData->registration_date }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                        <x-input-error :messages="$errors->get('registration_date')" class="mt-2" />
                    </div>
                    <div class="genre-select-box">
                        <label for="genre_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><svg
                                class="inline align-middle w-4 h-4 mb-0.5 me-0.5 text-red-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>{{ __('genre_name') }}</label>
                        <select id="genre_id" name="genre_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option value="{{ $assetData->genre_id }}">{{ $assetData->genre_name }}</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="{{ $assetData->genre_name }}"
                            value="{{ $assetData->genre_id }}">
                        <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                    </div>
                    <div class="catagory-select-box">
                        <label for="category_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><svg
                                class="inline align-middle w-4 h-4 mb-0.5 me-0.5 text-red-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>{{ __('category_name') }}</label>
                        <select id="category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option value="{{ $assetData->category_id }}">{{ $assetData->category_name }}</option>
                        </select>
                        <input type="hidden" name="{{ $assetData->category_name }}"
                            value="{{ $assetData->category_id }}">
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-2 mb-6">
                        <p class="mb-2 text-sm font-medium text-gray-900 dark:text-white"><svg
                                class="inline align-middle w-4 h-4 mb-1 me-0.5 text-red-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>資産タイプ選択</p>
                        <ul class="grid gap-6 md:grid-cols-2">
                            <li>
                                <input type="checkbox" id="current-asset" name="asset-type-flg" value="0"
                                    class="hidden peer" checked>
                                <label for="current-asset"
                                    class="inline-flex items-center justify-between w-full p-2.5 text-gray-500 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-primary-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="w-full text-sm font-semibold">【流動資産】</div>
                                        <div class="w-full text-sm"><svg
                                                class="w-4 h-4 mb-0.5 inline-block align-bottom text-blue-600 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            資産の価値が毎月<u class="underline font-semibold">変動する</u>場合はこちらを選択してください</div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="fixed-asset" name="asset-type-flg" value="1"
                                    class="hidden peer">
                                <label for="fixed-asset"
                                    class="inline-flex items-center justify-between w-full p-2.5 text-gray-500 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="w-full text-sm font-semibold">【固定資産】</div>
                                        <div class="w-full text-sm"><svg
                                                class="w-4 h-4 mb-0.5 inline-block align-bottom text-blue-600 dark:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            資産の価値が毎月<u class="underline font-semibold">変動しない</u>場合はこちらを選択してください
                                        </div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="edit-btn-group">
                    <button id="updated-btn"
                        class="text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-700 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><svg
                            id="updated-icon" class="w-5 h-5 me-2 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M17.7 7.7A7.1 7.1 0 0 0 5 10.8M18 4v4h-4m-7.7 8.3A7.1 7.1 0 0 0 19 13.2M6 20v-4h4" />
                        </svg>
                        <svg aria-hidden="true" role="status" id="updated-loading-icon"
                            class="w-4 h-4 me-3 text-white animate-spin hidden" viewBox="0 0 100 101" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        <span id="updated-text">{{ __('update') }}</span></button>
                    <a id="deleted-btn" data-modal-target="deleted-modal" data-modal-toggle="deleted-modal"
                        class="cursor-pointer text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-700 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><svg
                            id="deleted-icon" class="w-5 h-5 me-2 text-white dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                        {{ __('delete') }}</a>
                </div>
        </div>
        </form>
        </div>
    </section>

    {{-- 削除モーダル画面 --}}
    <div class="alert-modal">
        <div id="deleted-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700  border-2 border-red-500">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="deleted-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-red-500 w-12 h-12" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            この資産を削除してもよろしいでしょうか？</h3>
                        <div class="flex justify-center gap-4">
                            <form id="deleted-modal-form" class=""
                                action="{{ route('assets.destroy', [$assetData->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="deleted-modal-btn"
                                    class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-full text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    <svg id="deleted-modal-icon" class="w-5 h-5 me-2 text-white dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                    <svg aria-hidden="true" role="status" id="deleted-loading-icon"
                                        class="w-4 h-4 me-3 text-white animate-spin hidden" viewBox="0 0 100 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="#E5E7EB" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentColor" />
                                    </svg>
                                    {{ __('delete') }}
                                </button>
                            </form>
                            <button data-modal-hide="deleted-modal" type="button"
                                class="py-2.5 px-5 text-sm font-medium rounded-full text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                キャンセル</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module" defer>
        // ボタンクリック時の制御（二重送信防止）
        $("#updated-form").submit(function(e) {
            $("#updated-btn").prop('disabled', true);
            $("#updated-icon").addClass('hidden');
            $("#updated-loading-icon").removeClass('hidden');
            setTimeout(() => {
                $("#updated-btn").prop('disabled', false);
                $("#updated-loading-icon").addClass('hidden');
                $("#updated-icon").removeClass('hidden');
            }, 5000);
        });

        // 削除モーダルの処理
        $("#deleted-modal-form").submit(function(e) {
            $("#deleted-modal").hide();
            $("#deleted-modal-btn").prop('disabled', true);
            $("#deleted-modal-icon").addClass('hidden');
            $("#deleted-loading-icon").removeClass('hidden');
            setTimeout(() => {
                $("#deleted-modal-btn").prop('disabled', false);
                $("#deleted-modal-icon").removeClass('hidden');
                $("#deleted-loading-icon").addClass('hidden');
            }, 5000);
        });

        $('#genre_id').change(function() {
            let genreId = $(this).val();
            const categorySelect = $('#category_id');
            $("#category_id").prop('disabled', false)
            const categories = {!! json_encode($categories) !!};

            categorySelect.empty().append('<option value="">--選択してください--</option>');
            categories.forEach(function(category) {
                if (category.genre_id == genreId) {
                    var option = $('<option></option>').attr('value', category.id).text(category.name);
                    categorySelect.append(option);
                }
            });
        });

        // 資産タイプ選択時のJSの制御
        $('#current-asset').change(function() {
            let status = $(this).prop('checked');
            if (status === true) {
                $('#fixed-asset').prop('checked', false);
            } else {
                $('#fixed-asset').prop('checked', true);
            }
        });
        $('#fixed-asset').change(function() {
            let status = $(this).prop('checked');
            if (status === true) {
                $('#current-asset').prop('checked', false);
            } else {
                $('#current-asset').prop('checked', true);
            }
        });

        // 選択内容によってボタンの背景色を変更
        $('#changed_type_flg').change(function() {
            if ($(this).prop('checked')) {
                $('#updated-text').text('追加');
                $('#updated-btn').removeClass(
                    'bg-green-500 hover:bg-green-600 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700'
                );
                $('#updated-btn').addClass(
                    'bg-blue-500 hover:bg-blue-600 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700'
                );
            } else {
                $('#updated-text').text('更新');
                $('#updated-btn').addClass(
                    'bg-green-500 hover:bg-green-600 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-700'
                );
                $('#updated-btn').removeClass(
                    'bg-blue-500 hover:bg-blue-600 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700'
                );
            }
        });
    </script>
</x-app-layout>
