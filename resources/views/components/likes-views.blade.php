@props([
    'views' => $views,
    'articleId' => $articleId,
])
<div x-data="{likes:{{\Cache::get('likes_'.$articleId) ?? 0}}, views:{{\Cache::get('views_'.$articleId) ?? 0}}, data:{article_id:{{$articleId}}}}" {{$attributes->merge(['class' => 'flex '])}}>
    <p x-init="setTimeout(() => {
        axios.post('{{route('api.articles.view')}}', data).then((response) => {
            views = response.data.views;
        });
    }, 5000)">Просмотров: <span x-text="views"></span></p>
    <button
        @click="axios.post('{{route('api.articles.like')}}', data).then((response) => {
            likes = response.data.likes;
        });"
    >
        Лайков: <span x-text="likes"></span>
    </button>
</div>
