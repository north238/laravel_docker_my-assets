<div class="flex flex-col rounded-lg border bg-white md:col-span-3">
    <div
        class="flex flex-col items-center justify-between gap-4 border-b border-slate-100 p-5 text-center sm:flex-row sm:text-start">
        <div>
            <h2 class="mb-0.5 font-semibold">登録済みの資産</h2>
            <h3 class="text-sm font-medium text-slate-600">
                直近の資産データ<strong>{{ $totalCount }}件</strong>を表示しています
            </h3>
        </div>
        @if ($totalCount > 100)
            <div>
                <a href="javascript:void(0)"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-semibold leading-5 text-slate-800 hover:border-violet-300 hover:text-violet-800 active:border-slate-200">
                    全件表示する
                </a>
            </div>
        @endif
    </div>
    {{-- 資産データがない場合の処理を追加 --}}
    @if ($displayAllData->isEmpty() !== true)
        <div class="p-5">
            <div class="overflow-x-auto min-w-full rounded">
                <table class="text-sm  align-middle min-w-full">
                    <thead class="dark:bg-gray-700">
                        <tr class="border-b-2 border-slate-100">
                            <th scope="col"
                                class="min-w-[150px] px-3 py-2 text-start font-semibold text-slate-700 dark:text-white">
                                <div class="flex items-center">
                                    {{ __('registration_date') }}
                                </div>
                            </th>
                            <th scope="col"
                                class="min-w-[180px] px-3 py-2 text-start font-semibold text-slate-700 dark:text-white">
                                {{ __('asset_name') }}</th>
                            <th scope="col"
                                class="min-w-[150px] px-3 py-2 text-start font-semibold text-slate-700 dark:text-white">
                                <div class="flex items-center">
                                    {{ __('genre_name') }}
                                </div>
                            </th>
                            <th scope="col"
                                class="min-w-[150px] px-3 py-2 text-start font-semibold text-slate-700 dark:text-white">
                                <div class="flex items-center">
                                    {{ __('category_name') }}
                                </div>
                            </th>
                            <th scope="col"
                                class="min-w-[150px] px-3 py-2 text-start font-semibold text-slate-700 dark:text-white">
                                <div class="flex items-center">
                                    {{ __('amount') }}
                                </div>
                            </th>
                            <th scope="col"
                                class="min-w-[100px] ps-3 py-2 text-start font-semibold text-slate-700 dark:text-white">
                                {{ __('action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($displayAllData as $asset)
                            <tr
                                class="border-b border-slate-100 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-3 py-3 text-start text-slate-600 dark:text-white">
                                    {{ $asset['registration_date'] }}</td>
                                <td class="text-slate-800 dark:text-white px-3 py-3 font-medium text-start">
                                    @if ($asset['asset_type_flg'] === 0)
                                        <i class="fa-solid fa-money-bill-trend-up text-green-500 me-1"></i>
                                    @else
                                        <i class="fa-solid fa-vault text-blue-600 me-1"></i>
                                    @endif
                                    {{ $asset['name'] }}
                                </td>
                                <td class="px-3 py-3 text-start text-slate-600 dark:text-white"
                                    data-genre_id="{{ $asset['genre_id'] }}">
                                    {{ $asset['genre_name'] }}
                                </td>
                                <td class="px-3 py-3 text-start text-slate-600 dark:text-white">
                                    {{ $asset['category_name'] }}
                                </td>
                                <td class="amount-cell px-3 py-3 text-start font-medium text-green-500">
                                    {{ number_format($asset['amount']) }}円</td>
                                <td class="ps-3 py-3 text-start">
                                    <a href="{{ route('assets.show', [$asset->asset_id]) }}" id="asset-edit"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                            class="fa-regular fa-pen-to-square mr-1"></i>
                                        {{ __('edit') }}</a>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    @else
        <div class="p-5">
            <div class="text-center text-slate-700 dark:text-white">
                登録されているデータはありません
            </div>
        </div>
    @endif
</div>