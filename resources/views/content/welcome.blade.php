@extends('page')

@section('content')
    <div>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem voluptatem rerum expedita repudiandae beatae voluptate ea voluptatibus accusamus quibusdam. Odit in rem eligendi tempora aut!</p>
        <p>Magni, voluptas nobis? Eveniet consequatur omnis deserunt dolorem, in soluta neque voluptate minus possimus, laboriosam, quas quis necessitatibus? Architecto non, ut quod itaque aliquam maiores.</p>
    </div>

    <div class="block-teaser">
        <h2 class="text-center">Последние новости</h2>
        @include('chunks/news-list')
        <footer class="block-teaser__footer">
            <a href="{{ route('news') }}" class="block-teaser__more-link button button_ghost">Больше новостей</a>
        </footer>
    </div>

    <div class="feedback-wrapper">
        <h2 class="text-center">Обратная связь</h2>
        <x-feedback-form></x-feedback-form>
    </div>

    @include('chunks/last-feedbacks')
@endsection
