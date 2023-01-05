<x-layouts.main>
  <article class="w-[90%] max-w-5xl mx-auto space-y-6">
    <div>
      <img src="/{{ $work->thumbnail }}" alt="" class="w-full aspect-video object-cover rounded-md">
    </div>
    <div class="flex space-x-2 flex-wrap mt-4">
      @foreach ($work->tags as $tag)
        <p class="tag">{{ $tag->tag }}</p>
      @endforeach
    </div>
    <h2 class="small-title">{{ $work->title }}</h2>
    <div class="space-y-4">
      {!! $work->body !!}
    </div>
  </article>
  <section class="w-[90%] max-w-5xl mx-auto mt-24 space-y-8">
    <h2 class="small-title">{{ __('D\'autres travaux qui pourraient vous interesser') }}</h2>
    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-x-16 gap-y-10 items-start mt-16">
      @foreach ($randomWorks as $work)
        <x-work-card :$work />
      @endforeach
    </div>
  </section>
  @if ($sameAuthorQuestions->count())
    <section class="w-[90%] max-w-5xl mx-auto mt-24 space-y-8">
      <h2 class="small-title">{{ __('Des questions que cette personne à posées') }}</h2>
      <div class="">
        @foreach ($sameAuthorQuestions as $question)
          <x-forum.question :$question />
        @endforeach
      </div>
    </section>
  @endif
</x-layouts.main>
