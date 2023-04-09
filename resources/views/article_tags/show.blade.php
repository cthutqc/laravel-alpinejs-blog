<x-app-layout>
    <div class="grid grid-cols-3 gap-4">
        <div class="flex flex-wrap items-center h-fit">
            <a href="{{route('article_tags.show', $articleTag)}}" class="rounded-xl bg-slate-200 hover:bg-slate-300 hover:shadow-lg py-1 px-4 block mr-1 my-1">{{$articleTag->name}}</a>
        </div>
        <div class="col-span-2 space-y-10">
            @each('articles.item', $articles, 'article')
            <div class="mt-10">
                {{$articles->links('vendor.pagination.tailwind')}}
            </div>
        </div>
    </div>
</x-app-layout>
