@props([
    'likes' => $likes,
    'views' => $views,
    'articleId' => $articleId,
])
<div {{$attributes->merge(['class' => 'flex '])}}>
    <p>Просмотров: {{$views}}</p>
    <button
        x-data="{likes:{{$likes}}, data:{article_id:{{$articleId}}}}"
        @click="axios.post('/articles/like', data).then((response) => {
          likes++;
        });"
    >
        Лайков: <span x-text="likes"></span>
    </button>
</div>
