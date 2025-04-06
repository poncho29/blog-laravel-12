<x-mail::message>
# Post por aprobar

<x-mail::panel>
    Se ha creado un nuevo post que necesita ser aprobado
</x-mail::panel>

<x-mail::button :url="route('posts.show', $post->id)" color="error">
Ver post
</x-mail::button>

</x-mail::message>
