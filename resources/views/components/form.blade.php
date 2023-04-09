@props([
    'articleId' => $articleId
])
<div>
    <form x-data="commentForm()" @submit.prevent="submitForm">
        <div x-show="!success">
            <label for="name">Тема:</label>
            <input type="text"
                   id="subject"
                   name="subject"
                   x-model="form.subject"
                   class="w-full border rounded-md focus:outline-none border-slate-300 p-4"
            >
            <span x-show="errors.subject" x-text="errors.subject" class="block text-red-600"></span>
            <label for="name">Комментарий:</label>
            <textarea type="text"
                      id="body"
                      name="body"
                      x-model="form.body"
                      class="w-full border rounded-md focus:outline-none border-slate-300 p-4 h-32"
            ></textarea>
            <span x-show="errors.body" x-text="errors.body"  class="block text-red-600"></span>

            <button type="submit" class="rounded-md bg-slate-300 hover:bg-slate-400 px-10 py-1">Отправить</button>
        </div>

        <p x-show="success" class="my-10 block text-green-600 font-bold">
            Ваше сообщение успешно отправлено
        </p>
    </form>
    <script>
        function commentForm() {
            return {
                form: {
                    article_id: {{$articleId}},
                    subject: '',
                    body: '',
                },
                success:false,
                errors: [],
                async submitForm() {
                    try {
                        const response = await axios.post('/comment/store', this.form);
                        if(response)
                            this.success = true;
                    } catch (error) {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }
                    }
                },
            };
        }
    </script>
</div>
