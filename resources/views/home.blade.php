<x-app-layout>
    @if($pageData->first() == null)
    <div class="flex flex-col items-center">
        <h1 class="text-7xl text-red-500 p-5"> Ainda não há dados na página! </h1>
        <span class="p-5"> Vá para o <a href="{{route('cms.edit')}}" class="text-blue-400 underline underline-offset-2">editor</a> para começar! </span>
    </div>
    @else
    <div class="lg:mx-100 sm:pt-5 flex flex-col justify-center items-center bg-white shadow-sm sm:rounded-lg">
        @if($pageData->first()->image == null || $pageData->first()->image == '')
        <img src="{{asset('images/default.png')}}" alt="default.png">
        @else
        <img src="{{asset('storage/images/'.$pageData->first()->image)}}" alt={{$pageData->first()->image}}>
        @endif
        <p class="font-bold text-4xl pt-4" id="title"> {{$pageData->first()->title}} </p>
        <p class="text-xl"> {{$pageData->first()->subtitle}} </p>
    </div>
    <div class="lg:mx-100 flex flex-col justify-center items-center sm:p-10 lg:px-8 bg-white shadow-sm">

            <h1 class="text-sky-400 font-bold text-2xl"> Sobre o Desafio </h1>
            <div>
                <p class="sm:py-5 px-40"> {{$pageData->first()->content}} </p>
            </div>
    </div>

    <div class="lg:mx-100 flex flex-col justify-center items-center sm:p-6 lg:px-8 bg-blue-900 shadow-sm">
        <h1 class="text-white font-bold text-xl p-8" id="document"> Documentos de Suporte </h1>
        <div class="flex justify-center flex-wrap">
        @foreach($documents as $document)
            <div class="bg-white px-28 py-40 flex flex-col items-center rounded-md border-4 border-transparent m-10 max-w-xs">
                <img src="{{asset('icon_doc.png')}}" width="64" height="64" class="p-2 m-4">
                <span class="text-xl text-center"> {{$document->document_title}} </span>
                <br>
                <span class="text-sky-700 bg-sky-300 py-2 px-10 rounded-xl"> <a href="{{route('document.download', ['name' => $document->document_title])}}"> Baixar </a> </span>
            </div>
        @endforeach
        </div>
    </div>
    @endif
</x-app-layout>
