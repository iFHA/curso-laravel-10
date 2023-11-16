<x-alert/>
@csrf
<input
    type="text"
    name="subject"
    placeholder="Assunto"
    value="{{ old('subject') ?? $support?->subject ?? '' }}"
    autofocus
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
>
<textarea
    name="body"
    cols="30"
    rows="5"
    placeholder="Descrição"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
>{{ old('body') ?? $support?->body ?? '' }}</textarea>
<button
    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
    type="submit"
>{{ isset($support) ? 'Salvar' : 'Incluir' }} Dúvida</button>
<a
class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
href="{{ route('supports.index') }}">Voltar</a>
