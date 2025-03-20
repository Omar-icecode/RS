<x-layout>
    <a href="/" class="btn btn-secondary mt-2 btn-sm">back</a>
    <div class="text-center p-2"><h4>Marketer's Page</h4></div>

    <x-clients-table :clients="$clients"/>
</x-layout>