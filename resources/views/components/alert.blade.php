@props(['type'])
<div id="alert" class="hidden">
    @if ($type == 'success')
        <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-green-500">
                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center">
                    <span class="fas fa-check cursor-pointer text-green-500"></span>
                </div>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500 dark:text-green-400">Realizado</span>
                    <p class="text-sm text-black dark:text-gray-200">{{ Session::get('success') }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-red-500">
                <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center">
                    <span id="close" class="fas fa-times cursor-pointer text-red-500"></span>
                </div>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span id="close" class="font-semibold text-red-500 dark:text-green-400">Aviso</span>
                    <p class="text-sm text-black dark:text-gray-200">{{ Session::get('error') }}</p>
                </div>
            </div>
        </div>
    @endif
    <script>
        $('#alert').toggle('',false);
        setTimeout(() => {
            /* if ($('#alert').is('visible')) { */
                $('#alert').toggle('', false);
           /*  } */
        }, 3000);

   /*      $('#close').click(function(){
            $('#alert').toggle('', false);
        }); */
    </script>
</div>
