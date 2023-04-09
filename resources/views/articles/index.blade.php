<x-app-layout>
    <div class="grid grid-cols-3 gap-4">
        <div class="flex flex-wrap items-center h-fit">
            @each('article_tags.item', $article_tags, 'articleTag')
        </div>
        <div class="col-span-2 space-y-10">
            @each('articles.item', $articles, 'article')
            <div class="mt-10">
                {{$articles->links('vendor.pagination.tailwind')}}
            </div>
        </div>
    </div>
</x-app-layout>
