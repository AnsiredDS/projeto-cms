<x-app-layout>
    @if($pageData->first() == null)
    <div class="flex flex-col items-center">
        <h1 class="text-7xl text-red-500 p-5"> Ainda não há dados na página! </h1>
        <span class="p-5"> Vá para o <a href="{{route('cms.edit')}}" class="text-blue-400 underline underline-offset-2">editor</a> para começar! </span>
    </div>
    @else
    <div class="lg:mx-100 sm:p-5 flex flex-col justify-center items-center bg-white shadow-sm sm:rounded-lg">
        @if($pageData->first()->image == null || $pageData->first()->image == '')
        <img class="" src="{{asset('images/default.png')}}" alt="default.png">
        @else
        <img class="" src="{{asset('storage/images/'.$pageData->first()->image)}}" alt={{$pageData->first()->image}}>
        @endif
        <p class="font-bold text-4xl pt-4" id="title"> {{$pageData->first()->title}} </p>
        <p class="text-xl"> {{$pageData->first()->subtitle}} </p>
    </div>

    <div class="lg:mx-100 flex flex-col justify-center items-center sm:p-6 lg:px-8 bg-white shadow-sm">
            <h1 class="text-sky-400 font-bold text-xl"> Sobre o Desafio </h1>
            <div>
                <p class="sm:py-3 px-40"> {{$pageData->first()->content}} </p>
            </div>
    </div>

    <div class="lg:mx-100 flex flex-col justify-center items-center sm:p-6 lg:px-8 bg-blue-900 shadow-sm">
        <h1 class="text-white font-bold text-xl" id="document"> Documentos de Suporte </h1>
    </div>
    @endif
</x-app-layout>
