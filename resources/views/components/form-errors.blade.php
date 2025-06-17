@if($errors->any())
    <div class="flex w-full items-center my-4 p-4 overflow-hidden text-white bg-white/5 rounded-lg shadow-lg" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-12 h-12 text-red-300 bg-red-600 rounded-lg">
            <i class="fa-solid fa-plane-circle-xmark fa-xl p-4"></i>
        </div>
        <div class="ml-3 text-sm font-normal">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
