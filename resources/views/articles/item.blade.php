<div class="border border-slate-200 hover:shadow-xl">
    <a href="{{route('articles.show', $article)}}" class="block bg-no-repeat bg-center bg-cover w-full h-[300px]" style="background-image: url({{asset('images/thumb.jpg')}})"></a>
    <div class="p-4 space-y-4">
        <a href="{{route('articles.show', $article)}}" class="font-bold">{{$article->name}}</a>
        <div>
            {{$article->shortenText}}
        </div>
        <x-likes-views
            class="justify-between"
            :likes="$article->likes"
            :views="$article->views"
            :articleId="$article->id"
        />
    </div>
</div>
