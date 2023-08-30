<x-app-layout>
    <div class="flex justify-center items-center">
        <div class="p-5 bg-gray-200">
            <x-auth-session-status class="my-4 text-green-500" :status="session('status')"> </x-auth-session-status>
            <h1 class="py-5 text-xl font-bold"> Home </h1>
            <h2 class="text-xl font-bold text-gray-500"> Header </h2>
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
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <x-input-label class="py-2"> Sub-Título </x-input-label>
                    <x-text-input placeholder="Insira um sub-título..." name="subtitle" :value="old('subtitle', $pageData->first()->subtitle ?? '')"> Sub-Título </x-text-input>
                    <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                    <x-input-label class="py-2"> Imagem </x-input-label>
                    <x-file-input  name="image"> </x-file-input>
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
                <h2 class="py-5 text-xl font-bold text-gray-500"> Sobre o Desafio </h2>
                <div>
                    <x-input-label> Conteúdo </x-input-label>
                    <x-text-area rows="10" cols="50" name="content" required>
                        <x-slot name="value">{{old('content', $pageData->first()->content ?? '')}}</x-slot>
                    </x-text-area>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                </div>
                <x-primary-button class="mt-5 px-10">
                    @if($pageData->first() == null)
                    Criar
                    @else
                    Atualizar
                    @endif
                </x-primary-button>
            </form>

            <div class="pb-5">
                <h2 class="sm:py-5 text-xl font-bold text-gray-500"> Documentos de Suporte </h2>
                <form action="{{route('document.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <x-file-input name="document_title" required> </x-file-input>
                    <x-outline-primary-button class="lg:mx-100 grow-0"> Fazer upload do novo documento </x-outline-primary-button>
                </form>
                <x-input-error :messages="$errors->get('document_title')" class="mt-2"/>
                <x-auth-session-status :status="session('error')" class="text-red-600"> </x-auth-session-status>
            </div>

            <table class="table-auto border-collapse border-2 border-grey-500 ">
                <thead>
                    <tr>
                        <th scope="col" class="border border-2 border-gray-800 p-2 pr-32 "> Título do Documento </th>
                        <th scope="col" colspan="2" class="border border-2 border-gray-800 p-2"> Ações </th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($documents as $document)
                        <tr class="border border-2 border-gray-400">
                            <td class="p-2 bg-gray-300"> {{$document->document_title}} </td>
                            <form action="{{route('document.download', ['name' => $document->document_title])}}" method="GET">
                            @csrf
                            @method('GET')
                            <td class="p-2 bg-gray-300"> <x-secondary-button type="submit"> Baixar </x-secondary-button>  </a> </td>
                            </form>
                            <form action="{{route('document.destroy', ['id' => $document->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td class="p-2 bg-gray-300"> <x-danger-button> DELETAR </x-danger-button>  </a> </td>
                            </form>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
