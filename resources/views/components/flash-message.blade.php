@if(session()->has('message'))
    <p x-data="{show: true}"
    x-show="show"
    x-init="setTimeout(() => show = false, 3000)" class="fixed top-0 left-1/3 text-center bg-green-700 text-white px-48 py-3">
    {{session('message')}}
    </p>
@endif