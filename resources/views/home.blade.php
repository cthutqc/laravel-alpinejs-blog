<x-app-layout>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @each('articles.item', $articles, 'article')
    </div>
</x-app-layout>
