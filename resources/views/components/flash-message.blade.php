<div class="fixed top-6 right-6 z-[1000] w-auto">
    @if(session()->has('success'))
        <div id="toast" class="flex w-full items-center p-4 text-white bg-gray-600 rounded-lg shadow-lg" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-300 bg-green-600 rounded-lg">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="ml-3 mx-6 text-sm font-normal">{!! session('success') !!}</div>
            <button type="button" onclick="document.getElementById('toast').style.display = 'none';" class="ml-auto -mx-1.5 -my-1.5 text-gray-400 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#toast" aria-label="Close">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    @elseif(session()->has('error'))
        <div id="toast" class="flex w-full items-center p-4 text-white bg-gray-600 rounded-lg shadow-lg" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-300 bg-red-600 rounded-lg">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="ml-3 mx-6 6text-sm font-normal">{!! session('error') !!}</div>
            <button type="button" onclick="document.getElementById('toast').style.display = 'none';" class="ml-auto -mx-1.5 -my-1.5 text-gray-400 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#toast" aria-label="Close">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    @elseif(session()->has('warning'))
        <div id="toast" class="flex w-full items-center p-4 text-white bg-gray-600 rounded-lg shadow-lg" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-300 bg-orange-600 rounded-lg">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="ml-3 mx-6 text-sm font-normal">{!! session('warning') !!}</div>
            <button type="button" onclick="document.getElementById('toast').style.display = 'none';" class="ml-auto -mx-1.5 -my-1.5 text-gray-400 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 inline-flex h-8 w-8" data-dismiss-target="#toast" aria-label="Close">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    @endif
</div>

@if(session()->has('success') || session()->has('error') || session()->has('warning'))
    <script>
        setTimeout(function() {
            document.getElementById('toast').style.display = 'none';
        }, 3000);
    </script>
@endif
