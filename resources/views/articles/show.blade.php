<x-app-layout>
    <div class="space-y-10">
        <h1 class="text-2xl font-bold">{{$article->name}}</h1>
        <img src="{{asset('images/image.jpg')}}" class="w-full">
        <div>
            {{$article->text}}
        </div>
        <x-likes-views
            class="justify-start space-x-4"
            :likes="$article->likes"
            :views="$article->views"
            :articleId="$article->id"
        />
        <div class="flex justify-start">
            @each('article_tags.item', $article->article_tags, 'articleTag')
        </div>
        @each('comments.item', $article->comments, 'comment', 'comments.no-items')
        <x-form :articleId="$article->id" />
    </div>
</x-app-layout>
