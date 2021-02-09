<div class="text-muted">
    {{ empty(trim($slot)) ? __('add') : $slot }} {{ $date }}
    {!! isset($name) ? __('by') .',  <a href='. route('Entreprise.show', ['Entreprise' => $userId]) .'>'.$name . '</a>' : null !!}

</div>
