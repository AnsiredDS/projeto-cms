<x-app-layout>
    <div class="sm:p-5">
        <x-auth-session-status class="my-4 text-green-500" :status="session('status')"> </x-auth-session-status>
        <h1 class="sm:py-5 text-xl font-bold"> Home </h1>
        <h2 class="text-l font-bold text-gray-500"> Header </h2>
        @if($pageData->first() == null)
        <form action="{{route('cms.create')}}" method="POST" enctype="multipart/form-data">
        @method('post')
        @else
        <form action="{{route('cms.update', ['id' => $pageData->first()->id])}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @endif
            @csrf
            <div>
                <x-input-label class="py-2"> Título </x-input-label>
                <x-text-input placeholder="Insira um título..." name="title" :value="old('title', $pageData->first()->title ?? '')" required> Título </x-text-input>
                <x-input-label class="py-2"> Sub-Título </x-input-label>
                <x-text-input placeholder="Insira um sub-título..." name="subtitle" :value="old('subtitle', $pageData->first()->subtitle ?? '')"> Sub-Título </x-text-input>
                <x-input-label class="py-2"> Imagem </x-input-label>
                <x-file-input  name="image" class=""> Imagem </x-file-input>
            </div>
            <h2 class="sm:py-5 text-l font-bold text-gray-500"> Sobre o Desafio </h2>
            <div>
                <x-input-label> Conteúdo </x-input-label>
                <x-text-area rows="10" cols="50" name="content" required>
                    <x-slot name="value">{{old('content', $pageData->first()->content ?? '')}}</x-slot>
                </x-text-area>
            </div>
            <h2 class="sm:py-5 text-l font-bold text-gray-500"> Documentos de Suporte </h2>
            <div class="pb-5">
                <x-file-input id="document-button" name="documento" class="hidden"> </x-file-input>
                <label for="document-button" class="inline-flex items-center p-4 bg-transparent border-2 border-gray-500 font-semibold text-xs text-gray-500 tracking-widest hover:bg-gray-500 hover:text-white focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 cursor-pointer"> Upload de um Novo Documento </label>
            </div>
            <table class="table-auto border-collapse border-2 border-grey-500">
                <tbody>
                    <tr>
                        <th class="border border-2 border-gray-800 p-2 pr-32"> Título </th>
                        <th class="border border-2 border-gray-800 p-2"> Baixar </th>
                        <th class="border border-2 border-gray-800 p-2"> Excluir </th>
                    </tr>
                </tbody>
            </table>

            <x-primary-button class="mt-8 px-10">
                @if($pageData->first() == null)
                Criar
                @else
                Atualizar
                @endif
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
