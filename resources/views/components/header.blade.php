<x-container>
    <div class="flex justify-between items-center py-10">
        <div>
            <a href="/" class="font-bold text-3xl">{{config('app.name')}}</a>
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{route('home')}}" @class([
                        "text-slate-400",
                        "!text-black font-bold" => Route::is('home')
                ])>На главную</a>
            <a href="{{route('articles.index')}}" @class([
                        "text-slate-400",
                        "!text-black font-bold" => !Route::is('home')
                ])>Каталог статей</a>
        </div>
    </div>
</x-container>
