@props(['formAction' => false])

<div>
  @if($formAction)
  <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="p-4 bg-gray-100 border-b sm:px-6 sm:py-4 border-gray-150">
      @if(isset($title))
      <h3 class="text-lg font-medium leading-6 text-gray-900">
        {{ $title }}
      </h3>
      @endif
    </div>

    <div class="px-4 bg-white sm:p-6">
      <div class="space-y-6">
        {{ $content }}
      </div>
    </div>

    <div class="bg-gray-100">
      {{ $buttons }}
    </div>
    @if($formAction)
  </form>
  @endif
</div>
