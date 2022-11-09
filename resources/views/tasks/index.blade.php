<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Tasks List')
        </h2>
    </x-slot>
    <!-- Search Bar -->
    <form action="{{ route('tasks.search')}}" role="search" class="container flex justify-center mx-auto my-3">
      <div class="pt-2 relative mx-auto text-gray-600">
          <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
              type="search" name="search" placeholder="Search">
          <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
              <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
              viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
              width="512px" height="512px">
              <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
              </svg>
          </button>
      </div>
    </form>

    <div class="container flex justify-center mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="border-b border-gray-200 shadow pt-6">
                <table>
                  <thead class="bg-gray-50">
                    <tr>
                      <th class="px-2 py-2 text-xs text-gray-500">#</th>
                      <th class="px-2 py-2 text-xs text-gray-500">@lang('Title')</th>
                      <th class="px-2 py-2 text-xs text-gray-500">Etat</th>
                      <th class="px-2 py-2 text-xs text-gray-500"></th>
                      <th class="px-2 py-2 text-xs text-gray-500"></th>
                      <th class="px-2 py-2 text-xs text-gray-500"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    @foreach($tasks as $task)
                      <tr class="whitespace-nowrap">
                        <td class="px-4 py-4 text-sm text-gray-500">{{ $task->id }}</td>
                        <td class="px-4 py-4">{{ $task->title }}</td>
                        <td class="px-4 py-4">@if($task->state) {{ __('Done') }} @else {{ __('To do') }} @endif</td>
                        <x-link-button href="{{ route('tasks.show', $task->id) }}" class="bg-blue-700 hover:bg-blue-500 text-white font-bold rounded">
                            @lang('Show')
                        </x-link-button>
                        <x-link-button href="{{ route('tasks.edit', $task->id) }}" class="bg-green-700 hover:bg-green-500 text-white font-bold rounded">
                            @lang('edit')
                        </x-link-button>
                        <x-link-button onclick="event.preventDefault(); document.getElementById('destroy{{ $task->id }}').submit();" class="bg-red-700 hover:bg-red-500 text-white font-bold rounded">
                            @lang('Delete')
                        </x-link-button>
                        <form id="destroy{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>
</x-app-layout>